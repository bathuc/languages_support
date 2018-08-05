<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends BaseModel
{
    protected $table = 'word';

    public static function getRandomItem($wordNumber = 0, $userId, $subjectId=1)
    {
        // take all
        $words = [];
        $where = [
            ['user_id', '=', $userId],
            ['subject_id', '=', $subjectId],
        ];
        if($wordNumber === 'random'){
            $words = self::where($where)
                ->orderBy('id', 'DESC')
                ->get()->toArray();
        }
        else {
            $words = self::where($where)
                            ->orderBy('id', 'DESC')
                            ->skip($wordNumber*40)->take(40)
                            ->get()->toArray();
        }
        // return random
        if(!empty($words)){
            $randKey = array_rand($words, 1);
            return $words[$randKey];
        }

        return null;
    }

    public static function getWords($wordNumber = 0, $userId, $subjectId=1)
    {
        if($wordNumber === 'random') {
            $wordNumber = 0;
        }
        // take all
        $where = [
            ['user_id', '=', $userId],
            ['subject_id', '=', $subjectId],
        ];

        return
            self::where($where)
            ->orderBy('id', 'DESC')
            ->skip($wordNumber*40)->take(40)
            ->get()->toArray();
    }

    public static function getShuffleWords($wordNumber, $userId, $subjectId)
    {
        $where = [
            ['user_id', '=', $userId],
            ['subject_id', '=', $subjectId],
        ];
        if($wordNumber === 'random') {
            $words = self::where($where)
                    ->orderBy('id', 'DESC')
                    ->get()->toArray();
        }
        else{
            $words = self::where($where)
                ->orderBy('id', 'DESC')
                ->skip($wordNumber*40)->take(40)
                ->get()->toArray();
        }

        shuffle($words);
        return $words;
    }

}
