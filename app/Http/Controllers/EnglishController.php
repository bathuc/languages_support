<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tense;
use App\Models\TenseUse;
use App\Models\TenseExample;
use App\Models\Phrase;
use App\Models\Word;

class EnglishController extends Controller
{

    public function getRandomWord(Request $request)
    {
        $wordNumber = $request->wordNumber;
        $word = Word::getRandomItem($wordNumber);
        return view('frontend.english.words.random', compact('word','wordNumber'));
    }

    public function words(Request $request)
    {
        $wordNumber = 20;   // default
        $word = Word::getRandomItem($wordNumber);

        return view('frontend.english.words.words', compact('word', 'wordNumber'));
    }

    public function getRandomPhrase(Request $request)
    {
        $phrasesNumber = $request->phrasesNumber;
        $phrase = Phrase::getRandomItem($phrasesNumber);
        return view('frontend.english.phrases.random', compact('phrase','phrasesNumber'));
    }

    public function phrases(Request $request)
    {
        $phrasesNumber = 20; // default
        $phrase = Phrase::getRandomItem($phrasesNumber);

        return view('frontend.english.phrases.phrases', compact('phrase', 'phrasesNumber'));
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
