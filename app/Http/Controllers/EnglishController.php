<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tense;
use App\Models\TenseUse;
use App\Models\TenseExample;

class EnglishController extends Controller
{
    public function words(Request $request)
    {
        return view('frontend.english.words');
    }

    public function phrases(Request $request)
    {
        return view('frontend.english.phrases');
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
            $tenses = Tense::whereIn('id',$ids)->get()->toArray();
            $random = Tense::getRandomArray($ids, $request->typeCheck);
            return view('frontend.english.tenses.grammar_check', compact( 'tenses', 'random'));
        }
        return view('frontend.english.tenses.main', compact('tenses'));
    }
}
