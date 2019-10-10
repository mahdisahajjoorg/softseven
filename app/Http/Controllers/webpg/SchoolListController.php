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
      $student_idss = Score::where('school_id', $school_code->id)->groupBy('student_id')->get();
        foreach ($student_idss as $value) {
            $student_ids[] = $value->student_id;
        }
      
      
             return Datatables::of(Student::query()->whereIn('id', $student_ids)->orderBy('id','DESC'))
             ->editColumn('action', function(Student $st) {
                    return "<a class='btn btn-info' href='javascript:;' onclick='updateStudent(".$st->id.")'>Edit</a>";
                })

             ->escapeColumns([])
             ->make(true);


        }else{
            return 1;
        }
    }

    public function get_student($id){
        $student = Student::where('id',$id)->first();
        if($student!=null){
        echo json_encode($student);
        die();
        }
        
    }

    public function update_student(Request $request){
        $student = Student::where('id',$request->id)->first();
        if($student!=null){
            $student->grade = $request->grade;
            $student->is_approved = $request->status;
            if($student->update()){
                echo 1;
                die();
            }
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
