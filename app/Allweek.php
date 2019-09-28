<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allweek extends Model
{
    public $timestamps = false;
    
    public function grade(){
    	return $this->belongsTo('\App\Allgrade','grade_id');
    }
}
