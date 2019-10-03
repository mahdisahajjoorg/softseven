<?php


namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\Usa_state;
use App\School;
use App\Todayscore;
use DB;

class OuterSuperContestController extends Controller
{
    public function index(){
        $games = array('addition' => 'Addition', 'multiplication' => 'Multiplication','division' => 'Division','subtraction' => 'Subtraction', 'wordrace' => 'WordRace', 'georace' => 'GeoRace', 'money' => 'Money', 'time' => 'Time');
        $gamecontest = Supercontest::where('status',1)->get();
        $states = Usa_state::all();
        $schools = School::all();
        $schoolcodes = DB::table('todayscores')
        ->select('*', DB::raw('max(score) as maxscore'))
        ->where('created','=','2019-08-16')
        ->where('game_name','multiplication')
        ->groupBy('student_id')
        ->orderBy('maxscore','desc')
        ->get();
        return view('webpg.super_contest.index',['games'=>$games
        ,'gamecontest'=>$gamecontest
        ,'states'=>$states,'schools'=>$schools,'schoolcodes'=>$schoolcodes]);
    }

    public function super_contest_post(Request $request){
       if($request->game_type=='multiplication'){
        if ($request->options == 'today') {
              
            $cond='';
          $y = date('Y') - 1;
          $lastmonth = date('m') - 1;
          
         if ($request->state == null) {
          $cond .= " ";
          } else {
          $cond .= "  AND state='" . $request->state . "'";
          }
          if ($request->school == null) {
          $cond .= " ";
          } else {
          $cond .= "  AND school_code='" . $request->school . "'";
          }
  
          if ($request->options == 'today') {
                $cond .=" AND  created  ='". '2019-08-16' ."'";   
         } else if ($request->options == 'thismonth') {
             
          $month = date('m');
          $cond .= " AND YEAR(created) =" . date('Y') . " AND MONTH(created) = '" . $month . "'";
    
          } else if ($request->options == 'thisyear') {
              
           $cond .= " AND YEAR(created) = '" . date('Y') . "'";
          } else if ($request->options == 'lastmonth') {
              
          $month = date('m');
           $cond .= " AND (YEAR(created) ='" . $y . "' OR YEAR(created) =" . date('Y') . ") AND MONTH(created) = '" . $lastmonth . "'";
          
          } else if ($request->options == 'lastyear') {
              
           $cond .= " AND YEAR(created) = '" . $y . "'";
          
          } else if ($request->options == 'alltime') {
              
           $cond .="";
          
          }  
            
            
          $schoolcodes = DB::table('todayscores')
          ->select('*', DB::raw('max(score) as maxscore'))
          ->whereRaw($cond)
          ->where('game_name','multiplication')
          ->groupBy('student_id')
          ->orderBy('maxscore','desc')
          ->get(); 
          dd($schoolcodes);
    
      }
       }


       else if($request->game_type=='georace'){

       }
    }
}
