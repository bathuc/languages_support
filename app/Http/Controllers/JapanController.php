<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Higagana;
use App\Models\Katakana;

class JapanController extends Controller
{
    public function hiragana()
    {
        
    }

    public function katakana(Request $request)
    {
        $testFlag = null;
        $katakana = Katakana::get();
        if($request->post()) {
            $testFlag = 1;
            $data = $request->all();
            $chooseId = json_decode($data['chooseId']);
            $katakana = Katakana::getChoosenKatakana($chooseId);
//            echo "<pre>";
//            print_r($katakana);
//            echo "<pre>";
//            die();
        }
        return view('frontend.japan.katakana.katakana', compact('katakana', 'testFlag'));
    }
}
