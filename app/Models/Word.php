<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends BaseModel
{
    protected $table = 'word';

    public static function getRandomItem($latestFlag = true)
    {
        // first 1000 word
        if($latestFlag){
            $words = self::all()->take(100)->toArray();
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }
        else {
            $words = self::all()->toArray();
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }
    }
}
