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
      $query = School::query()->where('school_code', $school_code)->where('password', bcrypt($password));


             return Datatables::of($query)
             ->editColumn('city', function(Score $gr) {
                    return $gr->city.', '.$gr->state;
                })
             ->editColumn('student_name', function(Score $gr) {
                     $st =  \App\Student::where('id', $gr->student_id)->first();
                     return $st['firstname'] .' '. $st['firstname'];
                })
             ->editColumn('grand_total', function(Score $gr) {
                    
                    return true;
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
