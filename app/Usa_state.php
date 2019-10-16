<?php

namespace App;
use App\School;
use App\School_contact;

use Illuminate\Database\Eloquent\Model;

class Usa_state extends Model
{
    public function schools(){
        return $this->hasMany(School::class);
    }

    public function school_contacts(){
        return $this->hasMany(School_contact::class);
    }
}
