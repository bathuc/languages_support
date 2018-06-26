<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
