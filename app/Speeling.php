<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speeling extends Model
{
    public $timestamps = false;
    
    public function grade()
    {
    	return $this->belongsTo('App\Allgrade', 'grade_id');
    }

    public function week()
    {
    	return $this->belongsTo('App\Allweek', 'week_id');
    }

}
