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

class SchoolListController extends Controller
{
    protected $root = 'webpg.school_list.';

    public function index()
    {

        $data = [
            'schools'=> \App\School::all(),

        ];
        return view($this->root.'index', $data);
    }

    public function total_school_list(Request $request){
      $school_code =isset($request->school_code)?$request->school_code:'';
      $pass_check = '';
      $password =isset($request->password)?$request->password:'';


      $school_code = School::where('school_code', $school_code)->where('mainpassword', $password)->first();
      $student_ids = [];
      if ($school_code != NULL) {
      $student_idss = Score::where('school_id', $school_code->id)->groupBy('student_id')->whereYear('created', Carbon::now()->year)->get();
        foreach ($student_idss as $value) {
            $student_ids[] = $value->student_id;
        }
      
      
             return Datatables::of(Student::query()->whereIn('id', $student_ids)->orderBy('id','DESC'))
             ->editColumn('action', function() {
                    return "<a class='btn btn-info'>Edit</a>";
                })

             ->escapeColumns([])
             ->make(true);


        }else{
            return 1;
        }
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
