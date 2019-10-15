<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
class Nonstudent_payment extends Model
{
	public $timestamps = false;
    public function student_info(){
    	return $this->belongsTo(Student::class, 'student_id');
    }
}
