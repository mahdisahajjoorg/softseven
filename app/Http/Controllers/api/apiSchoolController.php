<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use Response;

class apiSchoolController extends Controller
{
private function cors() {

        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            // header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        }
    }

    public function getAllSchoolName(){
    	$all_school = School::select('school_name')->get();

    	$schools = [];
    	foreach ($all_school as $value) {
    		$schools[] = $value->school_name;
    	}
    	return response()->json($schools);
    }


    public function getSchool(Request $request){
        $this->cors();
       $data = file_get_contents("php://input");
        $result = json_decode($data);

    	$all_school = School::where('school_code',$request->school_code)->get();
    	$data = [
    		'School'=>$all_school
    	];
    	return response()->json($data);
    }


     public function fastcodenew(Request $request){
		$fastcode = $request->fastcode;
		$firstname = $request->firstname;
		$lastname = $request->lastname;
		$grade = $request->grade;
        if (preg_match('/\_/', $firstname)) {
            $firstname = preg_replace('/\_+/', ' ', $firstname);
        } else {
            $firstname = $firstname;
        }
        if (preg_match('/\_/', $lastname)) {
            $lastname = preg_replace('/\_+/', ' ', $lastname);
        } else {
            $lastname = $lastname;
        }

        if(!empty($fastcode)){
            $school = School::where('fastcode', $fastcode)->first();


            if(isset($school['School']['state'])){
                $usastate= Usa_state::find($school->state);
            }
            
        }
        $data=array();
        if(!empty($school) && isset($fastcode) &&  isset($firstname) && isset($lastname) && isset($grade)){
            $data['Status']='Success';
            $data['Student']=array(
                'firstname'=>isset($firstname)?$firstname:"",
                'lastname'=>isset($lastname)?$lastname:"",
                'city'=>isset($school->city)?$school->city:"",
                'state'=>isset($usastate->state_abbr)?$usastate->state_abbr:"",
                'state_abbr'=>isset($school->state)?$school->state:"",
                'country_id'=>isset($school->country_id)?$school->country_id:"",
                'school_code'=>isset($school->school_code)?$school->school_code:"",
                'grade'=>isset($grade)?$grade:""
            );
        }else{
            $data['Status']='Invalid';
        }
        
        return Response::json($data, 200);
    }
}
