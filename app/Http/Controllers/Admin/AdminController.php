<?php

namespace App\Http\Controllers\Admin;

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
    protected $candidate = [];

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
        $words = Word::paginate(10);
        return view('admin.words.words',compact('words'));
    }

    public function coundWord(Request $request) {
        $loginid = $request->input('word');
        $count = Word::where(['word' => $request->word])->count();
        return ['count' => $count];
    }

    public function wordNew(Request $request)
    {
        $message = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'word' => 'required|max:255',
                'meaning' => 'required|max:255',
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
                        'example' => $request->example
                    ];
                    Word::insert($data);
                    $message['success'] = 1;
                    $message['message'] = 'Words create successful';
                }
            }
        }
        return view('admin.words.words_new', compact('message'));
    }

    public function wordEdit(Request $request)
    {
        return view('admin.words.words_edit');
    }

    public function phrases(Request $request)
    {
        return view('admin.phrases.phrases');
    }
}
