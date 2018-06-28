<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Katakana extends BaseModel
{
    protected $table = 'katakana';

    public static function getChoosenKatakana($romajiArray)
    {
        if(empty($romajiArray)) return null;
        $katakana = self::where(function ($query) use ($romajiArray) {
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
        return $katakana;
    }

    public static function getRandomKatakana($romaji,$numberCharacter)
    {
        $randText = ''; $randRomaji = '';
        $katakana = self::getChoosenKatakana($romaji);
        $randKeys = array_rand($katakana, $numberCharacter);
        for($i=0; $i< $numberCharacter; $i++) {
            $randText .= $katakana[$randKeys[$i]]['name'];
            $randRomaji .= $katakana[$randKeys[$i]]['romaji'];
        }

        return [
            'katakana_text' => $randText,
            'romaji' => $randRomaji,
        ];

    }
}
