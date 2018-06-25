<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Higagana;
use App\Models\Katakana;

class JapanController extends Controller
{
    public function hiragana(Request $request)
    {
        $testFlag = null;$randText = ''; $randRomaji = '';
        $hiragana = Higagana::get();
        if($request->post()) {
            $testFlag = 1;
            $data = $request->all();
            $chooseId = json_decode($data['chooseId']);
            $hiragana = Higagana::getChoosenHigagana($chooseId);

            $numberCharacter = $data['numberCharacter'];
            if($numberCharacter < 1) $numberCharacter = 1;
            if($numberCharacter > count($hiragana))$numberCharacter = count($hiragana);
            if($numberCharacter > 10) $numberCharacter = 10;
            if(count($hiragana) <= 1) {
                $testFlag = 0;
                return view('frontend.japan.katakana.katakana', compact('katakana', 'testFlag'));
            }

            $randKeys = array_rand($hiragana, $numberCharacter);
            for($i=0; $i< $numberCharacter; $i++) {
                $randText .= $hiragana[$randKeys[$i]]['name'];
                $randRomaji .= $hiragana[$randKeys[$i]]['romaji'];
            }
        }
        return view('frontend.japan.hiragana.hiragana',
            compact('hiragana', 'testFlag', 'randText', 'randRomaji'));
    }

    public function katakana(Request $request)
    {
        $testFlag = null;$randText = ''; $randRomaji = '';
        $katakana = Katakana::get();
        if($request->post()) {
            $testFlag = 1;
            $data = $request->all();
            $chooseId = json_decode($data['chooseId']);
            $katakana = Katakana::getChoosenKatakana($chooseId);
            $numberCharacter = $data['numberCharacter'];
            if($numberCharacter < 1) $numberCharacter = 1;
            if($numberCharacter > count($katakana))$numberCharacter = count($katakana);
            if($numberCharacter > 10) $numberCharacter = 10;
            if(count($katakana) <= 1) {
                $testFlag = 0;
                return view('frontend.japan.katakana.katakana', compact('katakana', 'testFlag'));
            }

            $randKeys = array_rand($katakana, $numberCharacter);
            for($i=0; $i< $numberCharacter; $i++) {
                $randText .= $katakana[$randKeys[$i]]['name'];
                $randRomaji .= $katakana[$randKeys[$i]]['romaji'];
            }

        }
        return view('frontend.japan.katakana.katakana',
            compact('katakana', 'testFlag', 'randText', 'randRomaji'));
    }
}
