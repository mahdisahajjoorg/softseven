<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\School_contact;
use App\EmailSetting;
use App\Usa_state;
use App\Country;

class SchoolContactController extends Controller
{
    public function index(){
        $school_contacts = School_contact::with('sta')->get();
        $emailsetting = EmailSetting::first();
        return view('admin.school_contact.index',['school_contacts'=>$school_contacts,'emailsetting'=>$emailsetting]);

    }

    public function email_update(Request $request){
        $validateData = $request->validate([
            'email'=>'required|email'
        ]);
        $email = EmailSetting::first();
        if($email!=null){
            $email->email = $request->email;
            if($email->update()){
                return redirect()->route('school_contact.index')->with('success_message','Email updated successfully');
            }
        }
    }

    public function contact_delete(Request $request){
        $contact = School_contact::where('id',$request->id)->first();
        if($contact->delete()){
            echo json_encode(1);
        }
    }

    public function school_contact_edit_form($id){
        $school_contact = School_contact::with('sta')->with('cry')->where('id',$id)->first();
        $states = Usa_state::all();
        $countries = Country::all();
        return view('admin.school_contact.edit_contact',['school_contact'=>$school_contact,'states'=>$states,'countries'=>$countries]);
    }

    public function school_contact_edit_form_submit(Request $request){
        $validateData = $request->validate([
            'contact_person'=>'required',
            'contact_person_phone'=>'required',
            'school_name'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'address'=>'required',
            'school_phone'=>'required',
            'school_email'=>'required|email|unique:school_contacts,school_email,'.$request->contact_id
        ]);

        $school_contact = School_contact::where('id',$request->contact_id)->first();
        $school_contact->contact_person = $request->contact_person;
        $school_contact->contact_person_phone = $request->contact_person_phone;
        $school_contact->school_name = $request->school_name;
        $school_contact->city = $request->city;
        $school_contact->state = $request->state;
        $school_contact->country = $request->country;
        $school_contact->address = $request->address;
        $school_contact->school_phone = $request->school_phone;
        $school_contact->school_email = $request->school_email;
        $school_contact->principal = $request->principal;
        $options = array($request->more_info,$request->proposal,$request->schedule,$request->refer);
        $school_contact->options = json_encode($options);
        if($school_contact->update()){
            return redirect()->route('school_contact.index')->with('success_message','School Contact updated successfully!');
        }
    }

    public function send_mail($id){
        return view('admin.school_contact.send_mail',['id'=>$id]);
    }

    public function send_mail_submit(Request $request){
        $validateData = $request->validate([
            'subject'=>'required',
        ]);
        $school_contact = School_contact::where('id',$request->contact_id)->first();
        $to_email = $school_contact->school_email;
        $email_setting = EmailSetting::first();
        $from_email = $email_setting->email;
        $subject = $request->subject;
        $message = $request->message;
        $data = array('subject'=>$subject,'message'=>$message);
        if($to_email){
            Mail::send('email.mail_to_school',['data'=>$data],function($message) use($to_email,$from_email,$subject){
                $message->to($to_email,'School')
                        ->subject($subject);
                $message->from($from_email,'Admin');
        });
    }
}
}
