<?php

namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usa_state;
use App\Country;
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
    }
}
