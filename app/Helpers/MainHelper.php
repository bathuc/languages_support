<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MainHelper
{
    public static function getSubject()
    {
        return DB::table('subject')->get()->toArray();
    }

}