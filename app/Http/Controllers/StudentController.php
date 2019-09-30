<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Score;

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

    public function approved_students(){
        ini_set('memory_limit', '512M');
        $approved_students = Student::where('is_approved',1)->get();
        return view('admin.students.approved_students',['approved_students'=>$approved_students]);
    }

    public function reject_student($id){
        $student = Student::where('id',$id)->first();
        $student->is_approved = 0;
        if($student->update()){
            $score = Score::where('student_id',$id)->get();
            foreach($score as $s){
                $sc = Score::where('student_id',$s->student_id)->first();
                $sc->is_guest = 0;
                $sc->update();
            }
            return redirect()->route('student.approved_students')->with('success_message','Student rejected successfully');
        }
    }

    public function send_mail_student(){
        ini_set('memory_limit', '512M');
        $students = Student::select('id','firstname')->get();
        return view('admin.students.mail_student',['students'=>$students]);
    }
}
