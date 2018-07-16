<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrase extends BaseModel
{
    protected $table = 'phrase';

    public static function getRandomItem($phrasesNumber = 20, $userId)
    {
        // take all
        $phrases = [];
        if($phrasesNumber == 'random'){
            $phrases = self::where('user_id',$userId)->get()->toArray();
        }
        else {
            $phrases = self::where('user_id',$userId)->get()->take($phrasesNumber)->toArray();
        }

        if(!empty($phrases)){
            $randKey = array_rand($phrases, 1);
            return $phrases[$randKey];
        }

        return null;
    }
}
