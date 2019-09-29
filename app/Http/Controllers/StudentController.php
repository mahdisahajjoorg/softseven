<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function unapproved_students(){
        $unapproved_students = Student::where('is_approved',0)->get();
        return view('admin.students.unapproved_students',['unapproved_students'=>$unapproved_students]);
    }

    public function approve($id){
        $student = Student::where('id',$id)->first();
        $student->is_approved = 1;
        if($student->update()){
            return redirect()->route('student.unapproved_students')->with('success_message','The student is approved successfully');
        }
    }

    public function change_to_nonstudent($id){
        $student = Student::where('id',$id)->first();
        $student->school_code = '';
        if($student->update()){
            return redirect()->route('student.unapproved_students')->with('success_message','Changed to non-student successfully');
        }
    }

    public function approve_all(){
        $students = Student::where('is_approved',0)->get();
        if($students->count()>0){
            foreach($students as $s){
               $s->is_approved = 1;
               $s->update();
            }
        }
        return redirect()->route('student.unapproved_students')->with('success_message','All approved successfully');
    }
}
