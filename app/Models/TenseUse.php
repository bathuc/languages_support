<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenseUse extends Model
{
    protected $table = 'tenses_use';

    public function tense()
    {
        return $this->belongsTo('App\Models\Tense', 'tenses_id');
    }
}
