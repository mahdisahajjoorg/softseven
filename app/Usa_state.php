<?php

namespace App;
use App\School;

use Illuminate\Database\Eloquent\Model;

class Usa_state extends Model
{
    public function schools(){
        return $this->hasMany(School::class);
    }
}
