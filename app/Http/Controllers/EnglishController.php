<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\MainHelper;
use View;
use App\Models\Tense;
use App\Models\TenseUse;
use App\Models\TenseExample;
use App\Models\Phrase;
use App\Models\Word;

class EnglishController extends Controller
{
    protected $guard = 'admin';
    protected $admin = [];

    public function __construct()
    {
        $except = ['tenseDetail', 'tenses', 'grammarRandom'];
        // $this->middleware('auth:' . $this->guard)->except($except);
        $this->middleware(function ($request, $next) {
            if (!Auth::guard($this->guard)->check()) {
                return redirect()->route('tenses');
            }
            $this->admin = Auth::guard($this->guard)->user();
            View::share(['admin' => $this->admin]);
            return $next($request);
        })->except($except);
    }


    public function getRandomWord(Request $request)
    {
        $wordNumber = $request->wordNumber;
        $showTime = $request->showTime;
        $subjectId = $request->subjectId;
        $userId = $this->admin->id;
        $subject = MainHelper::getSubject($userId);
        $word = Word::getRandomItem($wordNumber, $userId, $subjectId);
        $word20 = Word::getWords(20, $userId, $subjectId);
        return view('frontend.english.words.random', compact('word', 'word20','wordNumber', 'showTime', 'subject', 'subjectId'));
    }

    public function words(Request $request)
    {
        $wordNumber = 20;   // default
        $showTime = 2; // second
        $userId = $this->admin->id;
        $subject = MainHelper::getSubject($userId);
        $subjectId = 1;     // default - common
        $word = Word::getRandomItem($wordNumber, $userId, $subjectId);
        $word20 = Word::where('user_id',$userId)->get()->take(20)->toArray();
        return view('frontend.english.words.words', compact('word', 'wordNumber', 'word20', 'showTime', 'subject', 'subjectId'));
    }

    public function getRandomPhrase(Request $request)
    {
        $phrasesNumber = $request->phrasesNumber;
        $showTime = $request->showTime;
        $userId = $this->admin->id;
        $phrase = Phrase::getRandomItem($phrasesNumber, $userId);
        return view('frontend.english.phrases.random', compact('phrase','phrasesNumber', 'showTime'));
    }

    public function phrases(Request $request)
    {
        $phrasesNumber = 20; // default
        $showTime = 2; // second
        $userId = $this->admin->id;
        $phrase = Phrase::getRandomItem($phrasesNumber, $userId);

        return view('frontend.english.phrases.phrases', compact('phrase', 'phrasesNumber', 'showTime'));
    }

    public function tenseDetail($id)
    {
        $tense = Tense::find($id);
        if(empty($tense)) {
            return redirect()->route('tenses');
        }
        return view('frontend.english.tenses.detail', compact('tense', 'tenseAll'));
    }

    public function tenses(Request $request)
    {
        $tenses = Tense::all();
        if($request->post()) {
            $ids = json_decode($request->chooseId,1);
            $type = $request->typeCheck;
            $simpleRand = true;
            session()->put('ids', $ids);
            session()->put('type', $type);
            session()->put('simpleRand', $simpleRand);
            $tenses = Tense::whereIn('id',$ids)->get()->toArray();
            $random = Tense::getRandomArray($ids, $request->typeCheck);
            return view('frontend.english.tenses.grammar_check', compact( 'tenses', 'random', 'simpleRand'));
        }
        return view('frontend.english.tenses.main', compact('tenses'));
    }

    public function grammarRandom(Request $request)
    {
        if($request->ajax()) {
            $ids = session()->get('ids');
            $type = session()->get('type');
            $simpleRand = $request->simpleRand;
            session()->put('simpleRand', $simpleRand);
            if( $ids && $type){
                $tenses = Tense::whereIn('id',$ids)->get()->toArray();
                $random = Tense::getRandomArray($ids, $type);
                return view('frontend.english.tenses.grammar_random', compact( 'tenses', 'random', 'simpleRand'));
            }
        }
    }
}
