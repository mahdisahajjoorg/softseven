<?php

namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\GeoraceScore;
use App\Score;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use DB;
class TopSchoolsController extends Controller
{
    protected $root = 'webpg.topschools.';

    public function index()
    {
        $games = array('addition' => 'Addition', 'multiplication' => 'Multiplication','division' => 'Division','subtraction' => 'Subtraction', 'wordrace' => 'WordRace', 'georace' => 'GeoRace', 'money' => 'Money', 'time' => 'Time');

        $data = [
            'games'=>$games,

        ];
        return view($this->root.'index', $data);
    }

    public function top_school_list(Request $request){
      $game_type =isset($request->game_type)?$request->game_type:'';

      $options =isset($request->options)?$request->options:'';
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

$query = $query->select(['scores.*',DB::raw('CONCAT(students.firstname," - ",students.lastname) AS student_name')])->with(['student'])->join('students','scores.student_id','=', 'students.id');

             return Datatables::of($query->groupBy('school_code')->with('student'))
             ->addIndexColumn()
             ->editColumn('city', function(Score $gr) {
                    return $gr->city.', '.$gr->state;
                })
             ->editColumn('firstname', function(Score $gr) {
                     $st =  \App\Student::where('id', $gr->student_id)->first();
                     return $st['firstname'] .' '. $st['lastname'];
                })
             ->editColumn('grand_total', function(Score $gr) {
                    
                    return Score::where('school_code', $gr->school_code)->sum('score');
                })
             ->escapeColumns([])
             ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
