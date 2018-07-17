<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainHelper
{
    public static function getSubject($userId)
    {
        return DB::table('subject')
                ->where('user_id',$userId)
                ->get()->toArray();
    }

}