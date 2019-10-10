<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School;
use App\Student;

class Appscore extends Model
{
    public function school(){
        return $this->belongsTo(School::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
