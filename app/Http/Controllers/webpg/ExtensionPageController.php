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
class ExtensionPageController extends Controller
{
    protected $root = 'webpg.extension_page.';

    public function index()
    {

        $data = [
            'schools'=> \App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function extenstion_list(Request $request){
      $school_code =isset($request->school_code)?$request->school_code:'';
      $pass_check = '';
      $password =isset($request->password)?$request->password:'';
      $school_id = -1;
      $school_codes = School::where('school_code', $school_code)->where('mainpassword', $password)->first();


      $query = '';
      $student_ids = [];
      if ($school_codes != NULL) {
          $school_id = $school_codes->id;
        }
      $query = Score::query()->where('school_id', $school_id)->groupBy('student_id')->whereIn('game_name',['addition','multiplication','subtraction','division','visual','auditory'])->where('score','!=','')->get();

             return Datatables::of($query)
             ->editColumn('name', function(Score $sc) {
                    return isset($sc->student)?$sc->student->firstname:'' .' '. isset($sc->student)?$sc->student->lastname:'';
                })
             ->editColumn('action', function(Score $sc) {
                    return "<a class='btn btn-info'>Edit</a>";
                })             
             ->editColumn('score_certificate', function(Score $sc) {
                    $all_certficate = Certificate::all();

                    if($sc->game_name=='auditory' || $sc->game_name=='visual'){
                          $gmnm='wordrace';
                    }else{
                          $gmnm=$sc->game_name;
                          $gmlv=$sc->game_level;
                          $scoress=$sc->score;
                          $jump_badge=$sc->jump_badge;
                    }

                    foreach($all_certficate as $key=>$val){
                                                      
                         if($val['jampbage'] != 0 && $jump_badge >= $val['jampbage'] && $val['type'] == 2){
                                return "<a href='".route('score.scores_award',['c_id'=>$val->id,'s_id'=>$sc->id])."'>".$val['title']."</a>";

                                }
                            }


                })
             ->editColumn('jumpbadge_certificate', function(Score $sc) {
                    $all_certficate = Certificate::all();

                    if($sc->game_name=='auditory' || $sc->game_name=='visual'){
                          $gmnm='wordrace';
                    }else{
                          $gmnm=$sc->game_name;
                          $gmlv=$sc->game_level;
                          $scoress=$sc->score;
                          $jump_badge=$sc->jump_badge;
                    }

                    foreach($all_certficate as $key=>$val){
                                                      
                         if($val['jampbage'] != 0 && $jump_badge >= $val['jampbage'] && $val['type'] == 2){
                                return "<a href=''>".$val['title']."</a>";

                                }
                            }
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
