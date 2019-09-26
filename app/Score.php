<?php

namespace App;
use App\School;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function school(){
        return $this->belongsTo(School::class);
    }
}
