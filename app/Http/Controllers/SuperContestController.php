<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperContestController extends Controller
{
    protected $root = "admin.supercontest.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allsuper = \App\Supercontest::all();
        return view($this->root.'index')->with('allsuper',$allsuper);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view($this->root.'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'name_problem' => 'required',
            'problem_number' => 'required',
            'date' => 'required',
            'timer' => 'required',
            'category' => 'required',
            'timer' => 'required',
            'first_value' => 'required',
            'second_value' => 'required',
        ]);
        $supercontest = new \App\Supercontest;


        $supercontest->name_problem = $request->name_problem;
        $supercontest->type = $request->type;
        $supercontest->problem_number = $request->problem_number;
        $supercontest->timer = $request->timer;
        $supercontest->date = $request->date;
        $supercontest->category = $request->category;
        $supercontest->status = $request->status;
        $supercontest->save();
 $supercontest_id = $supercontest->id;
        $first_value = $request->first_value;
        $second_value = $request->second_value;

        for ($i=0; $i < $request->problem_number; $i++) { 
        $supercontestproblem = new \App\Contestproblem;

        $supercontestproblem->first_value = $first_value[$i];
        $supercontestproblem->second_value = $second_value[$i];
        $supercontestproblem->supercontest_id = $supercontest_id;
        $supercontestproblem->save();
        }

        return redirect()->route('supercontest.index')->with("success","Data Added Successfully");
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
        $supercontest = \App\Supercontest::find($id);
        $supercontestproblem = \App\Contestproblem::where('supercontest_id',$id)->get();

        $data = [
            'supercontest'=>$supercontest,
            'supercontestproblem'=>$supercontestproblem,
        ];
        return view($this->root.'edit', $data);
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
        $request->validate([
            'type' => 'required',
            'name_problem' => 'required',
            'problem_number' => 'required',
            'date' => 'required',
            'timer' => 'required',
            'category' => 'required',
            'timer' => 'required',
            'first_value' => 'required',
            'second_value' => 'required',
        ]);
        $supercontest = \App\Supercontest::find($id);


        $supercontest->name_problem = $request->name_problem;
        $supercontest->type = $request->type;
        $supercontest->problem_number = $request->problem_number;
        $supercontest->timer = $request->timer;
        $supercontest->date = $request->date;
        $supercontest->category = $request->category;
        $supercontest->status = $request->status;
        $supercontest->save();

        $del_cont = \App\Contestproblem::where('supercontest_id', $id);
        $del_cont->get()->each->delete();

        $first_value = $request->first_value;
        $second_value = $request->second_value;

        for ($i=0; $i < $request->problem_number; $i++) { 
        $supercontestproblem = new \App\Contestproblem;

        $supercontestproblem->first_value = $first_value[$i];
        $supercontestproblem->second_value = $second_value[$i];
        $supercontestproblem->supercontest_id = $id;
        $supercontestproblem->save();
        }

        return redirect()->route('supercontest.index')->with("success","Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sup = \App\Supercontest::find($id);

        echo "adasdjjhasdj";
        $sup->delete();
        $del_cont = \App\Contestproblem::where('supercontest_id', $id);
        $del_cont->get()->each->delete();
        echo json_encode(1);
        return redirect()->route('supercontest.index')->with("success","Data Deleted Successfully");
    }

    public function deleteSuper(Request $request){
        $grade = \App\Supercontest::find($request->id);


         $del_cont = \App\Contestproblem::where('supercontest_id', $request->id);
        if($grade->delete() && $del_cont->get()->each->delete()){ 
            echo json_decode(1);
        }
    }

}
