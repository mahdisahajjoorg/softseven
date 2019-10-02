<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Score;
use Yajra\Datatables\Datatables;
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


        return view('admin.students.approved_students');
    }

    public function approved_students_list(){
             return Datatables::of(Student::query()->where('is_approved',1))
             ->editColumn('is_approved', function(Student $st) {
                    return '<a href='.route('student.reject_student',['id'=>$st->id]).'>Reject</a>';
                })
             ->editColumn('firstname', function(Student $st) {
                    return $st->firstname .' '.$st->firstname;
                })
             ->editColumn('city', function(Student $st) {
                    $place='';
                  if(isset($st->state) && !empty($st->state)) $place=$st->state;
                     else $place=$st->country;

                   return $st->city.', '.$place;
                })
             ->escapeColumns([])->make(true);
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

        $students = Student::select('id','firstname')->get();
        return view('admin.students.mail_student',['students'=>$students]);
    }

    public function student_list_for_send_mail(Request $request){
        $students = Student::select('id','firstname')->where('firstname','like','%'.$request->q.'%d')->get();
        // return view('admin.students.mail_student',['students'=>$students]);
        $html = [];
        foreach ($students as $value) {
            $html[] = ['id'=>$value->id, 'text'=>$value->firstname];
        }
        echo  json_encode($html);
    }

    public function sendMailStudent(Request $request){
        $student_ids = $request->student;
        $subject    = $request->subject;
        $mail_body  = $request->body;
        foreach ($student_ids as $student_id) {
            $to_email = Student::where('id',$student_id)->first();
            $from_email = Admin_user::where('type',1)->first()->email;
                    
                    $data = ['mail_body'=>$mail_body];
                    Mail::send('email.mail_student',$data,function($message) use ($from_email,$to_email, $subject){
                    $message->to($to_email->school_email, $to_email->school_name)
                            ->subject($subject);
                    $message->from($from_email,'Admin');         
                });
        }
            return redirect()->route('school.sendmail')->with('success','Mail Sent!');
    }
}
