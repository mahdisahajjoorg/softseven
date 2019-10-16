<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\School_contact;

class Country extends Model
{
    public $timestamps = false;
    public function school_contacts(){
        return $this->hasMany(School_contact::class);
    }
}
