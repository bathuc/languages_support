<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenseExample extends Model
{
    protected $table = 'tenses_example';

    public function tense()
    {
        return $this->belongsTo('App\Models\Tense', 'tenses_id');
    }
}
