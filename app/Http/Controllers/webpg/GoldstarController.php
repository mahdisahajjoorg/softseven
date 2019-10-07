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

class GoldstarController extends Controller
{
    protected $root = 'webpg.goldstar.';

    public function index()
    {

        return view($this->root.'index');
    }

    public function goldstar_list(Request $request){


      $query = Student::query();
             return Datatables::of($query->where('supercontest_g_star','!=',0)->orderBy('supercontest_g_star', 'DESC'))
              ->addIndexColumn()
             // ->editColumn('date', function(Score $sc) {
             //       return ($sc->created)?$sc->created:'...';
                      
             //    })
             ->editColumn('goldstar', function(Student $sc) {
                 return $sc->supercontest_g_star;
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
