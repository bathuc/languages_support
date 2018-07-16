<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MainHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use View;
use App\Models\Administrator;
use App\Models\Word;
use App\Models\Phrase;

class AdminController extends Controller
{
    protected $guard = 'admin';
    protected $admin = [];

    public function __construct() {
        $except = ['login', 'resetPassword'];
        $this->middleware(function ($request, $next) {
            if (!Auth::guard($this->guard)->check()) {
                return redirect()->route('admin.login');
            }
            $this->admin = Auth::guard($this->guard)->user();
            View::share(['admin' => $this->admin]);
            return $next($request);
        })->except($except);
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function login(Request $request) {
        $errors = '';
        // if user already  has a login, redirect to mypage
        if (Auth::guard($this->guard)->check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->post()) {
            $data = $request->all();
            $validator = Validator::make($data, [
                'email' => 'required|email|max:255',
                'password' => 'required|min:5|max:20',
            ]);
            if (!empty($validator) && $validator->fails()) {
                $errors = config('master.MESSAGE_NOTIFICATION.MSG_001');
            } else {
                $credential = ['email' => $data['email'], 'password' => $data['password']];
                if (Auth::guard($this->guard)->attempt($credential)) {
                    return redirect()->route('admin.dashboard');
                } else {
                    $errors = config('master.MESSAGE_NOTIFICATION.MSG_001');
                }
            }
        }

        return view('admin.login', compact('errors'));
    }

    public function logout() {
        Auth::guard($this->guard)->logout();
        return redirect()->route('admin.login');
    }

    public function words(Request $request)
    {
        $words = Word::where('user_id',$this->admin->id)->paginate(10);
        return view('admin.words.words',compact('words'));
    }

    public function coundWord(Request $request) {
        $count = Word::where(['word' => $request->word])->count();
        return ['count' => $count];
    }

    public function wordNew(Request $request)
    {
        $message = [];
        $subject = MainHelper::getSubject();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'word' => 'required|max:255',
                'meaning' => 'required|max:255',
                'subjectId' => 'required',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['success'] = 0;
                $message['message'] = config('master.MESSAGE_NOTIFICATION.MSG_031');
            } else {
                $count = Word::where(['word' => $request->word])->count();
                if (!$count) {
                    $data = [
                        'word' => $request->word,
                        'meaning' => $request->meaning,
                        'example' => $request->example,
                        'example1' => $request->example1,
                        'sound' => $request->sound,
                        'subject_id' => $request->subjectId,
                        'user_id' => $this->admin->id,
                    ];
                    Word::insert($data);
                    $message['success'] = 1;
                    $message['message'] = 'Words create successful';
                }
            }
        }

        return view('admin.words.words_new', compact('message','subject'));
    }

    public function wordEdit(Request $request, $id)
    {
        $word = Word::where(['id' => $id])->first();
        $subject = MainHelper::getSubject();
        if (empty($word) || $word->user_id != $this->admin->id) {
            return redirect()->route('admin.words');
        }

        $message = ['info' => [], 'pass' => []];
        if ($request->isMethod('post')) {
            // edit info
            $validator = Validator::make($request->all(), [
                'word' => 'required|max:255',
                'meaning' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['info']['success'] = 0;
                $message['info']['message'] = "Error Occur";
            } else {
                $dataUpdate = [
                    'word' => $request->word,
                    'meaning' => $request->meaning,
                    'example' => $request->example,
                    'example1' => $request->example1,
                    'sound' => $request->sound,
                    'subject_id' => $request->subjectId,
                ];

                Word::where('id', $id)->update($dataUpdate);
                $message['info']['success'] = 1;
                $message['info']['message'] = "Update successful";
            }
        }

        $word = Word::where(['id' => $id])->first();
        return view('admin.words.words_edit', compact('word', 'message', 'subject'));
    }

    public function phrases(Request $request)
    {
        $phrases = Phrase::where('user_id',$this->admin->id)->paginate(10);
        return view('admin.phrases.phrases',compact('phrases'));
    }

    public function coundPhrase(Request $request) {
        $count = Phrase::where(['phrase' => $request->phrase])->count();
        return ['count' => $count];
    }

    public function phrasesNew(Request $request)
    {
        $message = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'phrase' => 'required|max:255',
                'meaning' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['success'] = 0;
                $message['message'] = config('master.MESSAGE_NOTIFICATION.MSG_031');
            } else {
                $count = Phrase::where(['phrase' => $request->phrase])->count();
                if (!$count) {
                    $data = [
                        'phrase' => $request->phrase,
                        'meaning' => $request->meaning,
                        'example' => $request->example,
                        'example1' => $request->example1,
                        'user_id' => $this->admin->id,
                    ];
                    Phrase::insert($data);
                    $message['success'] = 1;
                    $message['message'] = 'Phrase create successful';
                }
            }
        }
        return view('admin.phrases.phrases_new', compact('message'));
    }

    public function phrasesEdit(Request $request, $id)
    {
        $phrase = Phrase::where(['id' => $id])->first();
        if (empty($phrase) || $phrase->user_id != $this->admin->id) {
            return redirect()->route('admin.phrases');
        }

        $message = ['info' => [], 'pass' => []];
        if ($request->isMethod('post')) {
            // edit info
            $validator = Validator::make($request->all(), [
                'phrase' => 'required|max:255',
                'meaning' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['info']['success'] = 0;
                $message['info']['message'] = "Error Occur";
            } else {
                $dataUpdate = [
                    'phrase' => $request->phrase,
                    'meaning' => $request->meaning,
                    'example' => $request->example,
                    'example1' => $request->example1,
                ];

                Phrase::where('id', $id)->update($dataUpdate);
                $message['info']['success'] = 1;
                $message['info']['message'] = "Update successful";
            }
        }

        $phrase = Phrase::where(['id' => $id])->first();
        return view('admin.phrases.phrases_edit', compact('phrase', 'message'));
    }
}
