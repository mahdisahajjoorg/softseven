<?php

namespace App;
use App\Score;

use Illuminate\Database\Eloquent\Model;
use App\School;
use App\Appscore;

class Student extends Model
{
    public $timestamps = false;

    public function school(){
    	return $this->belongsTo(School::class, 'school_code', 'school_code');
    }

    public function appscores(){
    	return $this->hasMany(Appscore::class);
    }
}
