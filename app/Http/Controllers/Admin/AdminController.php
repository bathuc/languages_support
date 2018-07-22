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
use App\Models\Subject;

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
                    if(Auth::guard($this->guard)->user()->avail_flg == 0) {
                        Auth::guard($this->guard)->logout();
                        $errors = 'user has been locked';
                    }
                    else {
                        return redirect()->route('admin.dashboard');
                    }
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

    public function getFromDictionary($word)
    {
        $re = "/(https:)(.)*(mp3)/";
        $reIPA = "/span class=\"ipa\">(.)*<\\/span>/";
        //$html= '<span class="ipa">ˈfəʊ.kəs</span>';
        //preg_match_all($reIPA, $html, $ipa);
        $url = 'https://dictionary.cambridge.org/dictionary/english/'. $word;
        $dictionary = MainHelper::curl('post',$url);
        preg_match_all($re, $dictionary, $soundMatch);
        preg_match_all($reIPA, $dictionary, $ipaMatch);

        $sound = ''; $ipa = '';
        if(isset($soundMatch[0][0])){
            $sound = $soundMatch[0][0];
        }

        if(isset($ipaMatch[0][0])){
            $keywords = preg_split("/[><]+/", $ipaMatch[0][0]);
            $ipa = $keywords[1];
        }

        return [
            'sound'=>$sound,
            'ipa'=>$ipa,
        ];
    }


    public function words(Request $request)
    {
        if($request->post()){
            // update sound
            if($request->updateSound == 'update') {
                $where = [
                    ['user_id' ,'=',$this->admin->id],
                    ['sound' ,'=',null],
                ];
                $words = Word::where($where)->get();

                foreach ($words as $word) {
                    $newSound = $this->getFromDictionary($word->word);
                    Word::where('id',$word->id)->update($newSound);
                }
                session()->flash('flash_success', 'Sound Link Updated');
            }
        }

        $words = Word::where('user_id',$this->admin->id)->paginate(10);
        return view('admin.words.words',compact('words'));
    }

    public function coundWord(Request $request) {
        $count = Word::where(['word' => $request->word,'user_id'=>$this->admin->id])->count();
        return ['count' => $count];
    }

    public function wordNew(Request $request)
    {
        $message = [];
        $subject = MainHelper::getSubject($this->admin->id);
        if(empty($subject)) {
            $message['success'] = 0;
            $message['message'] = 'Create Subject First';
        }

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
                $count = Word::where(['word' => $request->word,'user_id'=>$this->admin->id])->count();
                if (!$count) {
//                    $newSound = $this->getFromDictionary($request->word);
                    $data = [
                        'word' => $request->word,
                        'meaning' => $request->meaning,
                        'example' => $request->example,
                        'example1' => $request->example1,
                        'subject_id' => $request->subjectId,
                        'user_id' => $this->admin->id,
//                        'sound'=>$newSound['sound'],
//                        'ipa'=>$newSound['ipa'],
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
        $subject = MainHelper::getSubject($this->admin->id);
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
        $count = Phrase::where(['phrase' => $request->phrase,'user_id'=>$this->admin->id])->count();
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
                $count = Phrase::where(['phrase' => $request->phrase,'user_id'=>$this->admin->id])->count();
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

    public function subject(Request $request)
    {
        $subject = Subject::where('user_id',$this->admin->id)->paginate(10);
        return view('admin.subject.subject',compact('subject'));
    }

    public function coundSubject(Request $request) {
        $count = Subject::where(['name_eng' => $request->name_eng,'user_id'=>$this->admin->id])->count();
        return ['count' => $count];
    }

    public function subjectNew(Request $request)
    {
        $message = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name_eng' => 'required|max:255',
                'name_vi' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['success'] = 0;
                $message['message'] = config('master.MESSAGE_NOTIFICATION.MSG_031');
            } else {
                $count = Subject::where(['name_eng' => $request->name_eng,'user_id'=>$this->admin->id])->count();
                if (!$count) {
                    $data = [
                        'name_eng' => $request->name_eng,
                        'name_vi' => $request->name_vi,
                        'user_id' => $this->admin->id,
                    ];
                    Subject::insert($data);
                    $message['success'] = 1;
                    $message['message'] = 'Subject create successful';
                }
            }
        }
        return view('admin.subject.subject_new', compact('message'));
    }

    public function subjectEdit(Request $request, $id)
    {
        $subject = Subject::where(['id' => $id])->first();
        if (empty($subject) || $subject->user_id != $this->admin->id) {
            return redirect()->route('admin.subject');
        }

        $message = ['info' => [], 'pass' => []];
        if ($request->isMethod('post')) {
            if ($request->edittype == 'delete_subject') {
                Subject::where('id', $id)->delete();
                return redirect()->route('admin.subject');
            }

            // edit info
            $validator = Validator::make($request->all(), [
                'name_eng' => 'required|max:255',
                'name_vi' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['info']['success'] = 0;
                $message['info']['message'] = "Error Occur";
            } else {
                $dataUpdate = [
                    'name_eng' => $request->name_eng,
                    'name_vi' => $request->name_vi,
                ];

                Subject::where('id', $id)->update($dataUpdate);
                $message['info']['success'] = 1;
                $message['info']['message'] = "Update successful";
            }
        }

        $subject = Subject::where(['id' => $id])->first();
        return view('admin.subject.subject_edit', compact('subject', 'message'));
    }

    public function user(Request $request)
    {
        $superRoleId = config('master.ADMIN_ROLE.SUPER_ADMIN');
        if($this->admin->role != $superRoleId) {
            return redirect()->route('admin.dashboard');
        }

        $user = Administrator::where('role','!=',$superRoleId)->paginate(10);
        return view('admin.user.user',compact('user'));
    }

    public function coundUser(Request $request) {
        $count = Administrator::where(['email' => $request->email])->count();
        return ['count' => $count];
    }

    public function lockUser(Request $request)
    {
        $superRoleId = config('master.ADMIN_ROLE.SUPER_ADMIN');
        if($this->admin->role != $superRoleId) {
            return null;
        }
        // toggle lock user
        echo 'update';
        Administrator::where(['id' => $request->id])
                    ->update(['avail_flg'=>$request->available]);
    }

    public function userNew(Request $request)
    {
        $superRoleId = config('master.ADMIN_ROLE.SUPER_ADMIN');
        if($this->admin->role != $superRoleId) {
            return redirect()->route('admin.dashboard');
        }

        $message = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['success'] = 0;
                $message['message'] = config('master.MESSAGE_NOTIFICATION.MSG_031');
            } else {
                $count = Administrator::where(['email' => $request->email])->count();
                if (!$count) {
                    $data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => \Hash::make($request->password),
                        'role' => 2,
                    ];
                    Administrator::insert($data);
                    $message['success'] = 1;
                    $message['message'] = 'User create successful';
                }
            }
        }
        return view('admin.user.user_new', compact('message'));
    }

    public function userEdit(Request $request, $id)
    {
        $superRoleId = config('master.ADMIN_ROLE.SUPER_ADMIN');
        if($this->admin->role != $superRoleId) {
            return redirect()->route('admin.dashboard');
        }

        $user = Administrator::where(['id' => $id])->first();
        if (empty($user)) {
            return redirect()->route('admin.dashboard');
        }

        $message = ['info' => [], 'pass' => []];
        if ($request->isMethod('post')) {
            if ($request->edittype == 'lock_user') {
                Administrator::where(['id' => $id])->update(['avail_flg'=>0]);
                return redirect()->route('admin.user');
            }
            // edit info
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
            ]);
            if (!empty($validator) && $validator->fails()) {
                // fail
                $message['info']['success'] = 0;
                $message['info']['message'] = "Error Occur";
            } else {
                $dataUpdate = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];

                Administrator::where('id', $id)->update($dataUpdate);
                $message['info']['success'] = 1;
                $message['info']['message'] = "Update successful";
            }
        }

        $user = Administrator::where(['id' => $id])->first();
        return view('admin.user.user_edit', compact('user', 'message'));
    }
}
