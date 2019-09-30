<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Usa_state;
use App\Admin_user;
use App\Score;
use DB;
use App\Memo;
use App\Usa_county;
use App\Country;

class SchoolController extends Controller
{
    public function index(){
        $schools = School::with('state_details')->orderBy('id','desc')->get();
        return view('admin.schools.index',['schools'=>$schools]);
    }

    public function add_school_form(){
        $state = Usa_state::all();
        $country = Country::all();
        $montharray=array(
            '01'=>'January',
            '02'=>'February',
            '03'=>'March',
            '04'=>'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December'
            );    
        $rep = Admin_user::where('type',3)->get();
        return view('admin.schools.add_school',['state'=>$state
        ,'country'=>$country,'rep'=>$rep,'montharray'=>$montharray]);
    }

    public function get_county(Request $request){
        $state_name = Usa_state::where('id',$request->state_id)->first();
        $state = Usa_county::where('state',$state_name->name)->get();
        echo $state;
    }

    public function check_schoolcode(Request $request){
        $check = School::where('school_code',$request->code)->first();

        if (isset($check) && !empty($check)) {
            $message = 'This school code is already used.';
        } else {
            $message = 'Success';
        }


        echo $message;
    }

    public function add_school_form_submit(Request $request){
        $validateData = $request->validate([
            'school_name'=>'required|min:3',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'school_code'=>'required|unique:schools',
            'password'=>'required',
            'grade'=>'required',
            'payment_status'=>'required',
            'charter_member'=>'required',
            'school_email'=>'required|email|unique:schools',
            'fastcode'=>'unique:schools'
        ]);
        $school = new School();
        $school->school_name = $request->school_name;
        $school->username = $request->school_code;
        $school->password = Hash::make($request->password);
        $school->mainpassword = $request->password;
        $school->school_code = $request->school_code;
        $school->school_email = $request->school_email;
        $school->address = $request->address;
        $school->phone = $request->phone;
        $school->country_id = $request->country;
        $school->city = $request->city;
        $school->fastcode = $request->fastcode;
        $school->state = $request->state;
        $school->payment_status = $request->payment_status;
        $school->charter_member = $request->charter_member;
        $school->notes = $request->notes;
        $school->principal = $request->principal;
        $school->contact_person = $request->contact_person;
        $school->grade = $request->grade;
        $school->enrollment = $request->enrollment;
        $school->fax = $request->mobile_phone;
        $school->mascot = $request->mascot;
        $school->county_id = $request->county_id;
        $school->representative_id = $request->representative_id;
        $start_date = $request->start_date_year.'-'.$request->start_date_month.'-'.$request->start_date_day;
        $expire_date = $request->expire_date_year.'-'.$request->expire_date_month.'-'.$request->expire_date_day;
        $school->started_date = $start_date;
        $school->expire_date = $expire_date;
        if($school->save()){
            $from_email = Admin_user::where('type',1)->first()->email;
            $school_name = $school->school_name;
            $school_email = $school->school_email;
            $data = array('username'=>$school->username,'password'=>$school->mainpassword);
            Mail::send('email.add_school_mail',$data,function($message) use ($from_email,$school_name,$school_email){
            $message->to($school_email,$school_email)
                    ->subject('Your username  and password');
            $message->from($from_email,'Admin');         
        });
            return redirect()->route('school.index')->with('success_message','School added successfully');
        }

    }

    public function edit_school_form($id){
        $state = Usa_state::all();
        $country = Country::all();
        $montharray=array(
            '01'=>'January',
            '02'=>'February',
            '03'=>'March',
            '04'=>'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December'
            );    
        $rep = Admin_user::where('type',3)->get();
        $school = School::with('state_details')->where('id',$id)->first();
        return view('admin.schools.edit_school',['school'=>$school,'state'=>$state,'country'=>$country,'rep'=>$rep,'montharray'=>$montharray]);
    }

    public function get_county_one(Request $request){
        $s= Usa_state::where('id',$request->state_id)->first();
        $county = Usa_county::where('state',$s->name)->get();
        echo $county;
        die();
    }

    public function edit_school_form_submit(Request $request){
        $validateData = $request->validate([
            'school_name'=>'required|min:3',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'password'=>'required',
            'grade'=>'required',
            'payment_status'=>'required',
            'charter_member'=>'required',
            'school_email'=>'required|unique:schools,school_email,'.$request->school_id,
            'fastcode'=>'unique:schools,fastcode,'.$request->school_id
        ]);
        $school = School::where('id',$request->school_id)->first();
        $school->school_name = $request->school_name;
        $school->username = $request->school_code;
        $school->password = Hash::make($request->password);
        $school->mainpassword = $request->password;
        $school->school_code = $request->school_code;
        $school->school_email = $request->school_email;
        $school->address = $request->address;
        $school->phone = $request->phone;
        $school->country_id = $request->country;
        $school->city = $request->city;
        $school->fastcode = $request->fastcode;
        $school->state = $request->state;
        $school->payment_status = $request->payment_status;
        $school->charter_member = $request->charter_member;
        $school->notes = $request->notes;
        $school->principal = $request->principal;
        $school->contact_person = $request->contact_person;
        $school->grade = $request->grade;
        $school->enrollment = $request->enrollment;
        $school->fax = $request->mobile_phone;
        $school->mascot = $request->mascot;
        $school->county_id = $request->county_id;
        $school->representative_id = $request->representative_id;
        $start_date = $request->start_date_year.'-'.$request->start_date_month.'-'.$request->start_date_day;
        $expire_date = $request->expire_date_year.'-'.$request->expire_date_month.'-'.$request->expire_date_day;
        $school->started_date = $start_date;
        $school->expire_date = $expire_date;
        if($school->update()){
        //     $from_email = Admin_user::where('type',1)->first()->email;
        //     $school_name = $school->school_name;
        //     $school_email = $school->school_email;
        //     $data = array('username'=>$school->username,'password'=>$school->mainpassword);
        //     Mail::send('email.add_school_mail',$data,function($message) use ($from_email,$school_name,$school_email){
        //     $message->to($school_email,$school_email)
        //             ->subject('Your username  and password');
        //     $message->from($from_email,'Admin');         
        // });
            return redirect()->route('school.index')->with('success_message','School updated successfully');
        }
    }

    public function school_memo($id){
        $school_memos = Memo::with('school')->where('school_id',$id)->get();
        return view('admin.schools.memo',['school_memos'=>$school_memos]);
    }

    public function add_memo_form(){
        $schools = School::all();
        return view('admin.schools.add_memo',['schools'=>$schools]);
    }

    public function add_memo_form_submit(Request $request){
        $validateData = $request->validate([
            'school'=> 'required',
            'memo' => 'required',
            'date' => 'required'
        ]);
        $memo = new Memo();
        $memo->school_id = $request->school;
        $memo->memo = $request->memo;
        $memo->date = $request->date;
        if($memo->save()){
            return redirect()->route('school.school_memo',['id'=>$memo->school_id])->with('success_message','Memo added successfully!');
        }
    }

    public function edit_memo_form($id){
        $memo = Memo::where('id',$id)->first();
        $schools = School::all();
        return view('admin.schools.edit_memo',['memo'=>$memo,'schools'=>$schools]);
    }

    public function edit_memo_form_submit(Request $request){
        $validateData = $request->validate([
            'school'=> 'required',
            'memo' => 'required',
        ]);
        $memo = Memo::where('id',$request->memo_id)->first();
        $memo->school_id = $request->school;
        $memo->memo = $request->memo;
        if($request->date){
          $memo->date = $request->date;
        }
        if($memo->update()){
            return redirect()->route('school.school_memo',['id'=>$memo->school_id])->with('success_message','Memo updated successfully!');
        }
    }

    public function delete_memo(Request $request){
        $memo = Memo::where('id',$request->id)->first();
        $school_id = $memo->school_id;
        $data = [
            'school_id'=>$school_id,
            'code'=>1
        ];
        if($memo->delete()){
            echo json_encode($data);
            die();
        }       
    }

    public function school_expired(){
        $today = date('Y-m-d');
        $expired_school = School::where('expire_date','<',$today)->get();
        $school_id = array();
        if($expired_school->count()>0){
            foreach($expired_school as $e){
                $school_id[] = $e->id;
            }
        }
        $school_scores = DB::table('scores')
                 ->select('school_id', DB::raw('sum(score) as total'))
                 ->whereIn('school_id',$school_id)
                 ->groupBy('school_id')
                 ->get();
        $response = array();         
        foreach($school_scores as $s){
            $school = School::where('id',$s->school_id)->first();
            $response[] = [
                'school'=>$school,
                'score'=>$s->total
            ];
        }
        return view('admin.schools.school_expired',['school_scores'=>$response]);
    }

    public function edit_expire_month($id,$month){
        if($month==12){
          $time = time() + 12*30*24*3600;
          $date = date('Y-m-d',$time);
        }
        else{
          $time = time() + 3*30*24*3600;
          $date = date('Y-m-d',$time); 
        }
        $school = School::where('id',$id)->first();
        $school->expire_date = $date;
        if($school->update()){
            return redirect()->route('school.school_expired')->with('success_message',$month.' months payment confirmed');
        } 
    }



    //sajol
    //
    public function sendmail(){

        $allSchool = \App\School::all();
        $data = [
            'allSchool'=>$allSchool,
        ];
        return view('admin.schools.sendmail', $data);
    }

    public function send_mail(Request $request){
        $school_ids = $request->school;
        $subject    = $request->subject;
        $mail_body  = $request->mail_body;
        foreach ($school_ids as $school_id) {
            $to_email = School::where('id',$school_id)->first();
            $from_email = Admin_user::where('type',1)->first()->email;
                    
                    $data = ['mail_body'=>$mail_body];
                    Mail::send('email.mail_school',$data,function($message) use ($from_email,$to_email, $subject){
                    $message->to($to_email->school_email, $to_email->school_name)
                            ->subject($subject);
                    $message->from($from_email,'Admin');         
                });
        }
            return redirect()->route('school.sendmail')->with('success','Mail Sent!');
    }
}
