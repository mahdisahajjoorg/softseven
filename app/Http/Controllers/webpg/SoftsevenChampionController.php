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

class SoftsevenChampionController extends Controller
{
    protected $root = 'webpg.softseven_champion.';

    public function index()
    {

        $data = [
            'schools'=> \App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function softsevenchampions_list(Request $request){
      $school =isset($request->school)?$request->school:'';

      $query = Score::query();

      if($school){
      $query = Score::query()->where('school_id',$school);
      }


             return Datatables::of($query->orderBy('score', 'DESC')->limit(100))
              ->addIndexColumn()
             ->editColumn('addition', function(Score $sc) {
                   return ($sc->game_name == 'addition')?$sc->screen_name:'...';
                      
                })
             ->editColumn('multiplication', function(Score $sc) {
                 return ($sc->game_name == 'multiplication')?$sc->screen_name:'...';
                })             

             ->escapeColumns([])
             ->make(true);



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
