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
        $flags= array_merge($schools, $countries, $states);
        return view('admin.flags.index',['flags'=>$flags]);
    }
}
