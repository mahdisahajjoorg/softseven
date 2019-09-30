<?php

namespace App;
use App\School;
use App\Student;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function school(){
        return $this->belongsTo(School::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
