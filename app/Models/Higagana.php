<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Higagana extends BaseModel
{
    protected $table = 'hiragana';

    public static function getChoosenHigagana($romajiArray)
    {
        if(empty($romajiArray)) return null;
        $hiragana = self::where(function ($query) use ($romajiArray) {
            $flag = true;
            foreach ($romajiArray as $key => $item) {
                if($flag) {
                    $query->where([['romaji', '=', $item]]);
                    $flag = false;
                }
                else{
                    $query->orWhere([['romaji', '=', $item]]);
                }
            }
        })->get()->toArray();
        return $hiragana;
    }

    public static function getRandomHiragana($romaji,$numberCharacter)
    {
        $randText = ''; $randRomaji = '';
        $hiragana = self::getChoosenHigagana($romaji);
        $randKeys = array_rand($hiragana, $numberCharacter);
        for($i=0; $i< $numberCharacter; $i++) {
            $randText .= $hiragana[$randKeys[$i]]['name'];
            $randRomaji .= $hiragana[$randKeys[$i]]['romaji'];
        }

        return [
            'hiragana_text' => $randText,
            'romaji' => $randRomaji,
        ];

    }
}
