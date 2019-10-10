<?php


namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\Usa_state;
use App\School;
use App\Todayscore;
use App\Score;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class OuterSuperContestController extends Controller
{
    public function index(){
        $games = array('addition' => 'Addition', 'multiplication' => 'Multiplication','division' => 'Division','subtraction' => 'Subtraction', 'wordrace' => 'WordRace', 'georace' => 'GeoRace', 'money' => 'Money', 'time' => 'Time');
        $options = array('today' => 'Today', 'thismonth' => 'This Month','thisyear' => 'This Year','lastmonth' => 'Last Month', 'lastyear' => 'Last Year', 'alltime' => 'All Time');        
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
        ,'states'=>$states,'schools'=>$schools
        ,'schoolcodes'=>$schoolcodes,'options'=>$options]);
    }

    public function super_contest_data(Request $request){
      $game_type =isset($request->game_type)?$request->game_type:'';

      $options =isset($request->options)?$request->options:'';
      $state =isset($request->state)?$request->state:'';
      $school =isset($request->school)?$request->school:'';
      $game_name =isset($request->game_name)?$request->game_name:'';
      $query = Score::query();
      if($options == 'today'){
        $query = $query->whereYear('created',Carbon::now()->year)
                                   ->whereMonth('created', Carbon::now()->month)
                                   ->whereDay('created',Carbon::now()->day);
      }

      if($options == 'thismonth'){
        $query = $query->whereYear('created',Carbon::now()->year)
                                   ->whereMonth('created', Carbon::now()->month);
      }

      if($options == 'thisyear'){
        $query = $query->whereYear('created',Carbon::now()->year);
      }

      if($options == 'lastmonth'){
        $query = $query->whereYear('created',Carbon::now()->year)
                                   ->whereMonth('created', Carbon::now()->subMonth()->month);
      }

      if($options == 'lastyear'){
        $query = $query->whereYear('created',Carbon::now()->subYear()->year);

      }

      if($game_type){
        $query = $query->where('game_name', $game_type);
      }
      if($state){
        $query = $query->where('state', $state);
      }
      if($school){
        $query = $query->where('school_id', $school);
      }
      if($game_name){
        $query = $query->where('game_level', $game_name);
      }
             return Datatables::of($query->groupBy('student_id'))
             ->editColumn('city', function(Score $gr) {
                    return $gr->city.', '.$gr->state;
                })
             ->editColumn('firstname', function(Score $gr) {
                     $st =  \App\Student::where('id', $gr->student_id)->first();
                     return $st['firstname'].' '.$st['lastname'];
                })
             ->editColumn('grand_total', function(Score $gr) {
                    return \App\Score::where('student_id', $gr->student_id)->groupBy('student_id')->sum('score');
                })
             ->escapeColumns([])
             ->make(true);

    }

}
