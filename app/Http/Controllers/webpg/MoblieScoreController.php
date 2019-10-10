<?php
namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\Usa_state;
use App\School;
use App\Todayscore;
use App\Score;
use App\Appscore;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class MoblieScoreController extends Controller
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

        return view('webpg.mobile_score.index',['games'=>$games
        ,'gamecontest'=>$gamecontest
        ,'states'=>$states,'schools'=>$schools
        ,'schoolcodes'=>$schoolcodes,'options'=>$options]);
    }

    public function mobilescores_list(Request $request){
      $game_type =isset($request->game_type)?$request->game_type:'';
      $options =isset($request->options)?$request->options:'';
      $state =isset($request->state)?$request->state:'';
      $school =isset($request->school)?$request->school:'';
      $game_name =isset($request->game_name)?$request->game_name:'';
      $query = Appscore::query();
      if($options == 'today'){
        $query = $query->whereYear('appscores.created',Carbon::now()->year)
                                   ->whereMonth('appscores.created', Carbon::now()->month)
                                   ->whereDay('appscores.created',Carbon::now()->day);
      }

      if($options == 'thismonth'){
        $query = $query->whereYear('appscores.created',Carbon::now()->year)
                                   ->whereMonth('appscores.created', Carbon::now()->month);
      }

      if($options == 'thisyear'){
        $query = $query->whereYear('appscores.created',Carbon::now()->year);
      }

      if($options == 'lastmonth'){
        $query = $query->whereYear('appscores.created',Carbon::now()->year)
                                   ->whereMonth('appscores.created', Carbon::now()->subMonth()->month);
      }

      if($options == 'lastyear'){
        $query = $query->whereYear('appscores.created',Carbon::now()->subYear()->year);

      }

      if($game_type){
        $query = $query->where('game_name', $game_type);
      }
      if($state){
        $query = $query->where('appscores.state', $state);
      }
      if($school){
        $query = $query->where('school_id', $school);
      }
      if($game_name){
        $query = $query->where('game_level', $game_name);
      }

$query = $query->select(['appscores.*',DB::raw('CONCAT(students.firstname," - ",students.lastname) AS student_name')])->with(['student'])->leftJoin('students','appscores.student_id','=', 'students.id');

             return Datatables::of($query->groupBy('student_id'))
             ->addIndexColumn()
             ->editColumn('city', function(Appscore $gr) {
                    return $gr->city.', '.$gr->state;
                })
             ->editColumn('firstname', function(Appscore $gr) {
                     $st =  \App\Student::where('id', $gr->student_id)->first();
                     return $st['firstname'].' '.$st['lastname'];
                })
             ->editColumn('highestscore', function(Appscore $gr) {
                    return \App\Appscore::where('student_id', $gr->student_id)->max('score');
                })
             ->escapeColumns([])
             ->make(true);

    }

}
