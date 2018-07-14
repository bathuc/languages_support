<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrase extends BaseModel
{
    protected $table = 'phrase';

    public static function getRandomItem($phrasesNumber = 20)
    {
        // take all
        if($phrasesNumber == 'random'){
            $phrases = self::all()->toArray();
            $randKey = array_rand($phrases, 1);
            return $phrases[$randKey];
        }
        else {
            $phrases = self::all()->take($phrasesNumber)->toArray();
            $randKey = array_rand($phrases, 1);
            return $phrases[$randKey];
        }
    }
}
