<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tense extends Model
{
    protected $table = 'tenses';
    protected $fillable = ['name_eng', 'name_vi', 'signal_words','common'];

    public function tenseUse()
    {
        return $this->hasMany('App\Models\TenseUse', 'tenses_id');
    }

    public function tenseExample()
    {
        return $this->hasMany('App\Models\TenseExample', 'tenses_id');
    }

    public static function getRandomArray($ids, $type)
    {
        $tenses = self::whereIn('id',$ids)->get()->toArray();
        $tenseKey = array_rand($tenses,1);
        $tense = Tense::where('id',$tenses[$tenseKey])->first();
        if($type=='example'){
            $examples = $tense->tenseExample->toArray();
            $key = array_rand($examples,1);
            $random = ['tense_name'=>$tense->name_eng, 'rand_text'=> $examples[$key]['describe']];

            // tense simple case
            $three =  array_slice($examples, 0, 3);
            $threeKey =  array_rand($three,1);
            $random['rand_simple_text'] = $examples[$threeKey]['describe'];

            return $random;
        }
        else{
            // case type == use
            $uses = $tense->tenseUse->toArray();
            $key = array_rand($uses,1);
            $random = ['tense_name'=>$tense->name_eng, 'rand_text'=> $uses[$key]['describe']];

            // tense simple case
            $three =  array_slice($uses, 0, 3);
            $threeKey =  array_rand($three,1);
            $random['rand_simple_text'] = $uses[$threeKey]['describe'];

            return $random;
        }
    }
}
