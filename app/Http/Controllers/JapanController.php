<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Higagana;
use App\Models\Katakana;

class JapanController extends Controller
{
    public function index()
    {
        return redirect()->route('hiragana');
    }

    public function getHiraganaRandom(Request $request)
    {
        if($request->ajax()) {
            $romaji = session()->get('hira_romaji');
            $number = session()->get('hira_number');
            if( $romaji && $number){
                $random = Higagana::getRandomHiragana($romaji,$number);
                return view('frontend.japan.hiragana.random', compact('random'));
            }
        }
    }

    public function hiragana(Request $request)
    {
        $hiragana = Higagana::get();
        if($request->post()) {
            $data = $request->all();
            $romaji = json_decode($data['chooseId']);
            session()->put('hira_romaji', $romaji);
            session()->put('hira_number', $data['numberCharacter']);

            $numberCharacter = $data['numberCharacter'];
            $random = Higagana::getRandomHiragana($romaji,$numberCharacter);
            return view('frontend.japan.hiragana.hiragana_test', compact('random'));
        }
        return view('frontend.japan.hiragana.hiragana_selection', compact('hiragana'));
    }

    public function getKatakanaRandom(Request $request)
    {
        if($request->ajax()) {
            $romaji = session()->get('kana_romaji');
            $number = session()->get('kana_number');
            if( $romaji && $number){
                $random = Katakana::getRandomKatakana($romaji,$number);
                return view('frontend.japan.katakana.random', compact('random'));
            }
        }
    }

    public function katakana(Request $request)
    {
        $testFlag = null;$randText = ''; $randRomaji = ''; $error = '';
        $katakana = Katakana::get();
        if($request->post()) {
            $data = $request->all();
            $romaji = json_decode($data['chooseId']);
            session()->put('kana_romaji', $romaji);
            session()->put('kana_number', $data['numberCharacter']);

            $numberCharacter = $data['numberCharacter'];
            $random = Katakana::getRandomKatakana($romaji,$numberCharacter);
            return view('frontend.japan.katakana.katakana_test', compact('random'));
        }
        return view('frontend.japan.katakana.katakana_selection');
    }
}
