<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usa_state;
use App\Country;

class School_contact extends Model
{
    public $timestamps = false;

    public function sta(){
        return $this->belongsTo(Usa_state::class,'state');
    }
    public function cry(){
        return $this->belongsTo(Country::class,'country');
    }
}
