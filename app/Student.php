<?php

namespace App;
use App\Score;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function scores(){
        return $this->hasMany(Score::class);
    }
}
