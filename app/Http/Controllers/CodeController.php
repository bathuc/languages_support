<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function insertRowJs(Request $request)
    {
        if($request->ajax()){
            $rowId = $request->rowId;
            return view('frontend.code.render_js.insert_row', compact('rowId'));
        }
    }
    public function generateJs()
    {

        return view('frontend.code.render_js.main');
    }
}
