<?php

namespace App;
use App\School;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    public $timestamps = false;

    public function school(){
        return $this->belongsTo(School::class,'school_id');
    }
}
