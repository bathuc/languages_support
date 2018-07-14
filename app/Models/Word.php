<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends BaseModel
{
    protected $table = 'word';

    public static function getRandomItem($wordNumber = 20)
    {
        // take all
        if($wordNumber == 'random'){
            $words = self::all()->toArray();
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }
        else {
            $words = self::all()->take($wordNumber)->toArray();
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }
    }
}
