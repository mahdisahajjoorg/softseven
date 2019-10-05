<?php

namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\GeoraceScore;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class GrandTotalController extends Controller
{
    protected $root = 'webpg.grand_total.';

    public function index()
    {
        $games = array('addition' => 'Addition', 'multiplication' => 'Multiplication','division' => 'Division','subtraction' => 'Subtraction', 'wordrace' => 'WordRace', 'georace' => 'GeoRace', 'money' => 'Money', 'time' => 'Time');

        $data = [
            'games'=>$games,
            'states'=>\App\Usa_state::all(),
            'schools'=>\App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function grandtotal_per_students_list(Request $request){
      $game_type =isset($request->game_type)?$request->game_type:'';

      $options =isset($request->options)?$request->options:'';
      $state =isset($request->state)?$request->state:'';
      $school =isset($request->school)?$request->school:'';
      $query = GeoraceScore::query();
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
             return Datatables::of($query)
             ->editColumn('city', function(GeoraceScore $gr) {
                    return $gr->city.', '.$gr->state;
                })
             ->editColumn('student_name', function(GeoraceScore $gr) {
                    return $gr->student->firstname.' '.$gr->student->lastname;
                })
             ->editColumn('grand_total', function(GeoraceScore $gr) {
                    return $gr->score;
                })
             ->escapeColumns([])
             ->make(true);

    }


    public function get_school_by_state(Request $request){
        $state = $request->state;
        $all_schools = \App\School::where('state', $state)->get();
        $html = '';
        foreach ($all_schools as $value) {
            $html .= '<option value="'.$value->id.'">'.$value->school_name.'</option>';
        }
        return $html;
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
