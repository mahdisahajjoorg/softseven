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
class SchoolChampionController extends Controller
{
    protected $root = 'webpg.school_champion.';

    public function index()
    {

        $data = [
            'schools'=> \App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function schoolchampions_list(Request $request){
      $school_code =isset($request->school_code)?$request->school_code:'';
      $pass_check = '';

      $school_id = -1;
      $school_codes = School::where('school_code', $school_code)->first();


      $query = '';
      $student_ids = [];
      if ($school_codes != NULL) {
          $school_id = $school_codes->id;
        }
      $query = Score::query()->where('school_id', $school_id)->groupBy('student_id')->whereIn('game_name',['addition','multiplication','subtraction','division','visual','auditory'])->where('score','!=','')->get();

             return Datatables::of($query)
             ->editColumn('addition', function(Score $sc) {
                   return ($sc->game_name == 'addition')?$sc->screen_name:'...';
                      
                })
             ->editColumn('multiplication', function(Score $sc) {
                  return ($sc->game_name == 'multiplication')?$sc->screen_name:'...';
                })             
             ->editColumn('wordrace', function(Score $sc) {
                   return ($sc->game_name == 'wordrace')?$sc->screen_name:'...';
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
