<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoraceScore extends Model
{
    public function student(){
    	return $this->belongsTo('\App\Student');
    }
}
