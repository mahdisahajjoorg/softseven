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
        $data = [
            'states'=>\App\Usa_state::all(),
            'schools'=>\App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function grandtotal_per_students_list(Request $request){
      $game_type =$request->game_type;

      $options =$request->options;
      $state =$request->state;
      $school =$request->school;
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
