<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\School;
use App\Word;
use App\Block_word;
use App\Country;
use App\Usa_state;
use Carbon\Carbon;
class ApiStudentController extends Controller
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

    public function getStudent(Request $request){
        $this->cors();
       $data = file_get_contents("php://input");
        $result = json_decode($data);

    	$student = Student::where('screen_name', str_replace('_', ' ', $request->screen_name))->first();

    	$exp = School::where('school_code', $student->school_code)->first();
    	$now_date = Carbon::now();
    	$exp_date = new Carbon($exp->expire_date);
    	if($now_date > $exp_date){
    		$exp_stat = true;
    	}else{
    		$exp_stat = false;
    	}
    	$student_info = [
    		'id'=> $student->id,
    		'firstname'=> $student->firstname,
    		'lastname'=> $student->lastname,
    		'screen_name'=> $student->screen_name,
    		'screen_name2'=> $student->screen_name2,
    		'city'=> $student->city,
    		'state'=> $student->state,
    		'country'=> $student->country,
    		'school_code'=> $student->school_code,
    		'grade'=> $student->grade,
    		'teacher_id'=> $student->teacher_id,
    		'is_approved'=> $student->is_approved,
    		'can_play_unlimited'=> $student->can_play_unlimited,
    		'zip'=> $student->zip,
    		'created'=> $student->created,
    		'modified'=> $student->modified,
    		'firstname_status'=> $student->firstname_status,
    		'middlename'=> $student->middlename,
    		'word_level'=> $student->word_level,
    		'grand_total'=> $student->grand_total,
    		'pur_level'=> $student->pur_level,
    		'max_wor_level'=> $student->max_wor_level,
    		'mathrace_level'=> $student->mathrace_level,
    		'unlock_money_level'=> $student->unlock_money_level,
    		'unlock_time_level'=> $student->unlock_time_level,
    		'supercontest_g_star'=> $student->supercontest_g_star,
    		'school_name'=> $student->school->school_name,
    		'alevel'=> $student->appscores->where('game_name', 'addition')->max('game_level'),
    		'mlevel'=> $student->appscores->where('game_name', 'multiplication')->max('game_level'),
    		'slevel'=> $student->appscores->where('game_name', 'subtraction')->max('game_level'),
    		'dlevel'=> $student->appscores->where('game_name', 'division')->max('game_level'),
    		'exp'=>$exp_stat,
    	];
    	$data = [
    		'success'=>$student_info,
    	];

    	return response()->json($data);
    }



    public function request_screenname(Request $request){
        $fastcode = $request->username;
        $firstname = $request->firstname;
        $middle_inital = $request->middle_initial;
        $lastname = $request->lastname;
        $grade = $request->grade;


        //$fastcode = str_replace("_"," ",$fastcode);
        $this->layout = false;
        if (preg_match('/\_/', $firstname)) {
            $firstname = preg_replace('/\_+/', ' ', $firstname);
        } else {
            $firstname = $firstname;
        }
        if (preg_match('/\_/', $middle_inital)) {
            $middle_inital = preg_replace('/\_+/', ' ', $middle_inital);
        } else {
            $middle_inital = $middle_inital;
        }

        if (preg_match('/\_/', $lastname)) {
            $lastname = preg_replace('/\_+/', ' ', $lastname);
        } else {
            $lastname = $lastname;
        }

        if(!empty($fastcode)){
            $school = School::where('username', $fastcode)->with(['country','state_details'])->first();

        }


        if(!empty($school) && isset($fastcode) && isset($firstname) && isset($middle_inital)&& isset($lastname) && isset($grade)){

            $nounsarray = array();
            $adjectivearr = array();
            $animalarr = array();
            $plantarr = array();
            $namearr = array();

            $words = Word::all();
            $blockwords = Block_word::select('id','words')->get()->toArray();
            $mascot = $school['School']['mascot'];

            foreach ($words as $word) {
                if(!in_array($word['word'], $blockwords)){
                if($word['type'] == 'noun'){
                    $nounsarray[] = $word['word'];
                }
                if($word['type'] == 'adjective'){
                    $adjectivearr[] = $word['word'];
                }
                if($word['type'] == 'animal'){
                    $animalarr[] = $word['word'];
                }
                if($word['type'] == 'plant'){
                    $plantarr[] = $word['word'];
                }
                if($word['type'] == 'name'){
                    $namearr[] = $word['word'];
                }
            }
            }

            //
            $r1 = array_rand($nounsarray);
            $r2 = array_rand($adjectivearr);
            $r3 = array_rand($animalarr);
            $r4 = array_rand($plantarr);
            $r5 = array_rand($namearr);


            $st = Student::where('firstname', $firstname)->where('is_approved',1)->get();
            //
 
            $randnoun = $nounsarray[$r1];

            $randadjective = $adjectivearr[$r2];
            $randanimal = $animalarr[$r3];
            $randplant = $plantarr[$r4];
             $screennamearray = array();

            if(!empty($st)){

                    $acronym = strtoupper($firstname . $middle_inital . $lastname);
                    // $acronym = strtoupper($firstname[0] . $middle_inital[0] .$lastname[0]);

                $screennamearray[0] = $this->createAvalueForScreenName($firstname);

                do {
                    $screennamearray[1] = $acronym . ' ' . rand(1, 999);
                     $check = Student::where('screen_name', $screennamearray[1])->count();
                } while ($check > 0);

                    //
                    do {
                        $screennamearray[2] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
                        $check = Student::where('screen_name', $screennamearray[2])->count();
                    } while ($check > 0);
                    do {
                        $screennamearray[3] = $randanimal . ' ' . rand(100, 999);
                        $check = Student::where('screen_name', $screennamearray[3])->count();
                    } while ($check > 0);
                    do {
                        $screennamearray[4] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randanimal;
                        $check = Student::where('screen_name', $screennamearray[4])->count();
                    } while ($check > 0);

        if(isset($mascot)){
            do {
            $screennamearray[5] = $mascot . ' ' . rand(99,999);
            $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);  
        }else{
            do {
                 $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
                $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);   
        }
        
       //             
                    
                    
                    do {
                        $screennamearray[6] = $adjectivearr[array_rand($adjectivearr)] . ' ' . rand(1, 999);
                        $check = Student::where('screen_name', $screennamearray[6])->count();
                    } while ($check > 0);
         }else{
        
                $screennamearray[0] = $this->createAvalueForScreenName($firstname);

           
             $acronym = strtoupper($firstname[0] . $middle_inital[0] .$lastname[0]);

             $screennamearray[1] = $this->createAvalueForScreenName($acronym);

             $screennamearray[2] = $this->createAvalueForScreenName($school->country_id);

             $screennamearray[3] = $this->createAvalueForScreenName($school->city);
             $screennamearray[4] = $this->createAvalueForScreenName($school->name);


             
     if(isset($mascot) && $mascot != null){
            do {
            $screennamearray[5] = $mascot . ' ' . rand(99,999);
            $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);  
        }else{
            do {
                 $screennamearray[5] = $adjectivearr[array_rand($adjectivearr)] . ' ' . $randplant;
                $check = Student::where('screen_name', $screennamearray[5])->count();
            } while ($check > 0);   
        }
            $screennamearray[6] = $this->createAvalueForScreenName($adjectivearr[array_rand($adjectivearr)]);
         }

     }


     //$firstname . $middle_inital . $lastname
        if(!empty($screennamearray) && isset($fastcode) && isset($firstname) && isset($middle_inital) && isset($lastname) && isset($grade)){

            $data['Status']='Success';
            $data['Student']=array(
                'firstname'=>isset($firstname)?$firstname:"",
                'middlename'=>isset($middle_inital)?$middle_inital:"",
                'lastname'=>isset($lastname)?$lastname:"",
                'grade'=>isset($grade)?$grade:"",
                'fastcode'=>isset($fastcode)?$fastcode:""
            );
            $data['School']=array(
                'school_name'=>isset($school->school_name)?$school->school_name:"",
                'username'=>isset($school->username)?$school->username:"",
                'school_code'=>isset($school->school_code)?$school->school_code:"",
                'school_email'=>isset($school->school_email)?$school->school_email:"",
                'address'=>isset($school->address)?$school->address:"",
                'phone'=>isset($school->phone)?$school->phone:"",
                'country_id'=>isset($school->country_id)?$school->country_id:"",
                'country_name'=>isset($school->country->name)?$school->country->name:"",
                'city'=>isset($school->city)?$school->city:"",
                'state'=>isset($school->state)?$school->state:"",
                'state_name'=>isset($school->state_details->name)?$school->state_details->name:"",
                'state_abbr'=>isset($school->state_details->state_abbr)?$school->state_details->state_abbr:"",
                'fastcode'=>isset($school->fastcode)?$school->fastcode:""
            );
            $data['screenname']=$screennamearray;
        }else{
            $data['Status']='Invalid';
            $data['Student']="";
            $data['screenname']="";
            $data['School']="";
        }

        return response()->json($data, 200);



    }



    public function createAvalueForScreenName($name){

          $scr_name = explode(' ', $name);
            $inc_value = isset($scr_name[1])?$scr_name[1]:'001';
            $new_name = $scr_name[0].' '.$inc_value;

        $getalName = Student::select('screen_name')->where('screen_name', $new_name)->count();

        if($getalName > 0){
            $inc_value = (int)$inc_value+1;
            if($inc_value < 10){
                $inc_value='00'.$inc_value;
            }elseif($inc_value > 9 && $inc_value < 100){
                $inc_value='0'.$inc_value;
            }
            $new_name = $scr_name[0].' '.(string)$inc_value;
            $this->createAvalueForScreenName($new_name);
        }
        return $new_name;
    }



}
