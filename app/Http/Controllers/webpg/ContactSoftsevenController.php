<?php

namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usa_state;
use App\Country;
use App\School_contact;
use Illuminate\Support\Facades\Mail;
use App\Admin_user;
use App\School;
class ContactSoftsevenController extends Controller
{
    public function contact_softseven_form(){
        $states = Usa_state::all();
        $countries = Country::all();
        return view('webpg.contact.contact_softseven',['states'=>$states,'countries'=>$countries]);
    }

    public function contact_softseven_form_submit(Request $request){
        $validateData = $request->validate([
            'contact_person'=>'required',
            'contact_person_phone'=>'required',
            'school_name'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'address'=>'required',
            'school_phone'=>'required',
            'school_email'=>'required|email|unique:schools'
        ]);
        $school_contact = new School_contact();
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
        $options = array();
        for($i=0;$i<4;$i++){
            if($i=0){
                $options[] = $request->more_info;
            }
            if($i=1){
                $options[] = $request->proposal;
            }
            if($i=2){
                $options[] = $request->schedule;
            }
            if($i=3){
                $options[] = $request->refer;
            }
        }
        $school_contact->options = json_encode($options);
        if($school_contact->save()){
            $to_email = Admin_user::where('type',1)->first()->email;
            $country = Country::where('id',$school_contact->country)->first();
            $data = array('school_name'=>$school_contact->school_name
            ,'city'=>$school_contact->city,'country'=>$country->name
            ,'principal'=>$school_contact->principal
            ,'contact_person'=>$school_contact->contact_person
            ,'school_phone'=>$school_contact->school_phone
            ,'contact_person_phone'=>$school_contact->contact_person_phone
            ,'school_email'=>$school_contact->school_email);
            Mail::send('email.mail_school_contact',$data,function($message) use ($to_email){
            $message->to($to_email,'Admin')
                    ->subject('New School Added');
            $message->from($to_email,'Admin');
        });

           return redirect()->route('contact.contact_softseven_form')->with('success_message','Thank you! we will contact you shortly');
  
    }
}

}
