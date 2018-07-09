<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrase extends BaseModel
{
    protected $table = 'phrase';

    public static function getRandomItem($latestFlag = true)
    {
        // first 1000 phrase
        if($latestFlag){
            $phrases = self::all()->take(100)->toArray();
            $randKey = array_rand($phrases, 1);
            return $phrases[$randKey];
        }
        else {
            $phrases = self::all()->toArray();
            $randKey = array_rand($phrases, 1);
            return $phrases[$randKey];
        }
    }
}
