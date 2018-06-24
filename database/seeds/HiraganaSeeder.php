<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HiraganaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            //a
            ['name' => 'あ', 'romaji'=> 'a'],
            ['name' => 'い', 'romaji'=> 'i'],
            ['name' => 'う', 'romaji'=> 'u'],
            ['name' => 'え', 'romaji'=> 'e'],
            ['name' => 'お', 'romaji'=> 'o'],

            //k
            ['name' => 'か', 'romaji'=> 'ka'],
            ['name' => 'き', 'romaji'=> 'ki'],
            ['name' => 'く', 'romaji'=> 'ku'],
            ['name' => 'け', 'romaji'=> 'ke'],
            ['name' => 'こ', 'romaji'=> 'ko'],

            //s
            ['name' => 'さ', 'romaji'=> 'sa'],
            ['name' => 'し', 'romaji'=> 'shi'],
            ['name' => 'す', 'romaji'=> 'su'],
            ['name' => 'せ', 'romaji'=> 'se'],
            ['name' => 'そ', 'romaji'=> 'so'],

            //t
            ['name' => 'た', 'romaji'=> 'ta'],
            ['name' => 'ち', 'romaji'=> 'chi'],
            ['name' => 'つ', 'romaji'=> 'tsu'],
            ['name' => 'て', 'romaji'=> 'te'],
            ['name' => 'と', 'romaji'=> 'to'],

            //n
            ['name' => 'な', 'romaji'=> 'na'],
            ['name' => 'に', 'romaji'=> 'ni'],
            ['name' => 'ぬ', 'romaji'=> 'nu'],
            ['name' => 'ね', 'romaji'=> 'ne'],
            ['name' => 'の', 'romaji'=> 'no'],

            //h
            ['name' => 'は', 'romaji'=> 'ha'],
            ['name' => 'ひ', 'romaji'=> 'hi'],
            ['name' => 'ふ', 'romaji'=> 'fu'],
            ['name' => 'へ', 'romaji'=> 'he'],
            ['name' => 'ほ', 'romaji'=> 'ho'],

            //m
            ['name' => 'ま', 'romaji'=> 'ma'],
            ['name' => 'み', 'romaji'=> 'mi'],
            ['name' => 'む', 'romaji'=> 'mu'],
            ['name' => 'め', 'romaji'=> 'me'],
            ['name' => 'も', 'romaji'=> 'mo'],

            //y
            ['name' => 'や', 'romaji'=> 'ya'],
            ['name' => 'ゆ', 'romaji'=> 'yu'],
            ['name' => 'よ', 'romaji'=> 'yo'],

            //r
            ['name' => 'ら', 'romaji'=> 'ra'],
            ['name' => 'り', 'romaji'=> 'ri'],
            ['name' => 'る', 'romaji'=> 'ru'],
            ['name' => 'れ', 'romaji'=> 're'],
            ['name' => 'ろ', 'romaji'=> 'ro'],

            //w
            ['name' => 'わ', 'romaji'=> 'wa'],
            ['name' => 'を', 'romaji'=> 'wo'],

            //n
            ['name' => 'ん', 'romaji'=> 'n'],
        ];
        DB::table('hiragana')->delete();
        DB::table('hiragana')->insert($data);
    }
}
