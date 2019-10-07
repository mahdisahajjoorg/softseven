<?php

namespace App\Http\Controllers\webpg;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supercontest;
use App\GeoraceScore;
use App\Score;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use \App\School;
use \App\Student;
use Illuminate\Support\Facades\Hash;
use App\Certificate;

class TodaysChampionController extends Controller
{
    protected $root = 'webpg.todays_champion.';

    public function index()
    {

        $data = [
            'schools'=> \App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function todayschampions_list(Request $request){
      $game_type =isset($request->game_type)?$request->game_type:'';
      $options =isset($request->options)?$request->options:'';

      $query = Score::query();

      if($game_type){
      $query = Score::query()->where('game_name',$game_type);
      }
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

             return Datatables::of($query->orderBy('score', 'DESC')->limit(100))
              ->addIndexColumn()
             ->editColumn('student_name', function(Score $sc) {
                   return $sc->student['firstname'] .' '. $sc->student['firstname'];
                      
                })
             ->editColumn('address', function(Score $sc) {
                  return $sc->city.', '.$sc->state;
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
