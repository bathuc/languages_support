<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends BaseModel
{
    protected $table = 'word';

    public static function getRandomItem($wordNumber = 20, $userId, $subjectId=1)
    {
        // take all
        $words = [];
        $where = [
            ['user_id', '=', $userId],
            ['subject_id', '=', $subjectId],
        ];
        if($wordNumber == 'random'){
            $words = self::where($where)->get()->toArray();
        }
        else {
            $words = self::where($where)->get()->take($wordNumber)->toArray();
        }
        // return random
        if(!empty($words)){
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }

        return null;
    }

    public static function getWords($wordNumber = 20, $userId, $subjectId=1)
    {
        // take all
        $where = [
            ['user_id', '=', $userId],
            ['subject_id', '=', $subjectId],
        ];

        return self::where($where)->get()->take($wordNumber)->toArray();
    }
}
