<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Usa_state;
use App\Country;

class FlagController extends Controller
{
    public function index(){
        $schools = School::where('flag_file_name','<>',"")->get();
        $states = Usa_state::where('flag_file_name','<>',"")->get();
        $countries = Country::where('flag_file_name','<>',"")->get();
        return view('admin.flags.index',['schools'=>$schools,'states'=>$states,'countries'=>$countries]);
    }

    public function add_flag_form(){
        $schools = School::all();
        $countries = Country::all();
        $states = Usa_state::all();
        return view('admin.flags.add_flag',['schools'=>$schools,'states'=>$states,'countries'=>$countries]);
    }

    public function add_flag_form_submit(Request $request){
        $validateData = $request->validate([
            'flag' => 'required | mimes:jpeg,jpg,png,gif',
        ]);

        if($request->type=="School"){
            $school = School::where('id',$request->school_id)->first();
            $file = $request->file('flag');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move('assets/flag/school/',$filename);
            $school->flag_file_name = $filename;
            if($school->update()){
                return redirect()->route('flag.index')->with('success_message','Flag added successfully');
            }
        }
        else if($request->type=="Country"){
            $country = Country::where('id',$request->country)->first();
            $file = $request->file('flag');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move('assets/flag/country/',$filename);
            $country->flag_file_name = $filename;
            if($country->update()){
                return redirect()->route('flag.index')->with('success_message','Flag added successfully');
            }
        }
        else if($request->type=="State"){
            $state = Usa_state::where('id',$request->state)->first();
            $file = $request->file('flag');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move('assets/flag/state/',$filename);
            $country->flag_file_name = $filename;
            if($country->update()){
                return redirect()->route('flag.index')->with('success_message','Flag added successfully');
            }
        }
        
    }

    public function remove_flag(Request $request){
        $id = $request->id;
        $type = $request->type;
        if($type=="School"){
            $school = School::where('id',$id)->first();
            $school->flag_file_name = "";
            if($school->update()){
                echo json_encode(1);
                die();
            }
        }
        else if($type=="Country"){
            $country = Country::where('id',$id)->first();
            $country->flag_file_name = "";
            if($country->update()){
                echo json_encode(1);
                die();
            }
        }
        else if($type="State"){
            $state = State::where('id',$id)->first();
            $state->flag_file_name = "";
            if($state->update()){
                echo json_encode(1);
                die();
            }
        }
    }
}
