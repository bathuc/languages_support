<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katakana extends BaseModel
{
    protected $table = 'katakana';

    public static function getChoosenKatakana($data)
    {
        if(empty($data)) return null;
//        $katakana = self::where(function ($query) use ($data){
//            $query->where([['romaji', '=', 'a']]);
//            $query->orWhere([['romaji', '=', 'i']]);
//        })->get();

        $katakana = self::where(function ($query) use ($data) {
            $flag = true;
            foreach ($data as $key => $item) {
                if($flag) {
                    $query->where([['romaji', '=', $item]]);
                    $flag = false;
                }
                else{
                    $query->orWhere([['romaji', '=', $item]]);
                }
            }
        })->get()->toArray();
        return $katakana;
    }
}
