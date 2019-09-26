<?php

namespace App;
use App\Usa_state;
use App\Memo;
use App\Score;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function state_details(){
        return $this->belongsTo(Usa_state::class,'state');
    }

    public function memos(){
        return $this->hasMany(Memo::class);
    }

    public function scores(){
        return $this->hasMany(Score::class);
    }
}
