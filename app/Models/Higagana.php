<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Higagana extends BaseModel
{
    protected $table = 'hiragana';

    public static function getChoosenHigagana($data)
    {
        if(empty($data)) return null;
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
