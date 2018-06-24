<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatakanaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert katakana
        $data = [
            //a
            ['name' => 'ア', 'romaji'=> 'a'],
            ['name' => 'イ', 'romaji'=> 'i'],
            ['name' => 'ウ', 'romaji'=> 'u'],
            ['name' => 'エ', 'romaji'=> 'e'],
            ['name' => 'オ', 'romaji'=> 'o'],

            //k
            ['name' => 'カ', 'romaji'=> 'ka'],
            ['name' => 'キ', 'romaji'=> 'ki'],
            ['name' => 'ク', 'romaji'=> 'ku'],
            ['name' => 'ケ', 'romaji'=> 'ke'],
            ['name' => 'コ', 'romaji'=> 'ko'],

            //s
            ['name' => 'サ', 'romaji'=> 'sa'],
            ['name' => 'シ', 'romaji'=> 'shi'],
            ['name' => 'ス', 'romaji'=> 'su'],
            ['name' => 'セ', 'romaji'=> 'se'],
            ['name' => 'ソ', 'romaji'=> 'so'],

            //t
            ['name' => 'タ', 'romaji'=> 'ta'],
            ['name' => 'チ', 'romaji'=> 'chi'],
            ['name' => 'ツ', 'romaji'=> 'tsu'],
            ['name' => 'テ', 'romaji'=> 'te'],
            ['name' => 'ト', 'romaji'=> 'to'],

            //n
            ['name' => 'ナ', 'romaji'=> 'na'],
            ['name' => 'ニ', 'romaji'=> 'ni'],
            ['name' => 'ヌ', 'romaji'=> 'nu'],
            ['name' => 'ネ', 'romaji'=> 'ne'],
            ['name' => 'ノ', 'romaji'=> 'no'],

            //h
            ['name' => 'ハ', 'romaji'=> 'ha'],
            ['name' => 'ヒ', 'romaji'=> 'hi'],
            ['name' => 'フ', 'romaji'=> 'fu'],
            ['name' => 'ヘ', 'romaji'=> 'he'],
            ['name' => 'ホ', 'romaji'=> 'ho'],

            //m
            ['name' => 'マ', 'romaji'=> 'ma'],
            ['name' => 'ミ', 'romaji'=> 'mi'],
            ['name' => 'ム', 'romaji'=> 'mu'],
            ['name' => 'メ', 'romaji'=> 'me'],
            ['name' => 'モ', 'romaji'=> 'mo'],

            //y
            ['name' => 'ヤ', 'romaji'=> 'ya'],
            ['name' => 'ユ', 'romaji'=> 'yu'],
            ['name' => 'ヨ', 'romaji'=> 'yo'],

            //r
            ['name' => 'ラ', 'romaji'=> 'ra'],
            ['name' => 'リ', 'romaji'=> 'ri'],
            ['name' => 'ル', 'romaji'=> 'ru'],
            ['name' => 'レ', 'romaji'=> 're'],
            ['name' => 'ロ', 'romaji'=> 'ro'],

            //w
            ['name' => 'ワ', 'romaji'=> 'wa'],
            ['name' => 'ヲ', 'romaji'=> 'wo'],

            //n
            ['name' => 'ン', 'romaji'=> 'n'],
        ];

        DB::table('katakana')->truncate();
        DB::table('katakana')->insert($data);
    }
}
