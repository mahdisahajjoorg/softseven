<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpellingBeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $allgrade = \App\Allgrade::all();
        return view('admin.spelling_bee.grade.index')->with('allgrade', $allgrade);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spelling_bee.grade.add');
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
            'grade' => 'required',
        ]);
        $grade = new \App\Allgrade;

        $grade->grade = $request->grade;
        $grade->save();

        return redirect()->route('allgrade.index')->with("success","Data Updated Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = \App\Allgrade::find($id);
        return view('admin.spelling_bee.grade.edit')->with('grade', $grade);
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
            'grade' => 'required',
        ]);
        $grade = \App\Allgrade::find($id);

        $grade->grade = $request->grade;
        $grade->save();

        return redirect()->route('allgrade.index')->with("success","Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = \App\Allgrade::find($id);
        $grade->delete();
return redirect()->route('allgrade.index')->with("success","Data Deleted Successfully");
    }

    public function delete_grade(Request $request){
        $grade = \App\Allgrade::find($request->id);
        if($grade->delete()){
            echo json_decode(1);
        }
    }


    //week section
    public function allWeek(){
        $all_week = \App\Allweek::all();
        return view('admin.spelling_bee.weeks.index')->with('weeks', $all_week);
    }

    public function weekCreate(){
        $allgrade = \App\Allgrade::all();
        return view('admin.spelling_bee.weeks.add')->with('allgrade', $allgrade);
    }

    public function weekSave(Request $request){
    $request->validate([
            'grade' => 'required',
            'week' => 'required',
            'status' => 'required',
        ]);
        $grade = new \App\Allweek;

        $grade->grade_id = $request->grade;
        $grade->week = $request->week;
        $grade->status = $request->status;
        $grade->save();

        return redirect()->route('all_week')->with("success","Data Inserted Successfully");
    }

    public function weekEdit($id){
        $allgrade = \App\Allgrade::all();
        $all_week = \App\Allweek::find($id);

        $data = [
            'allgrade'=> $allgrade,
            'week'=> $all_week,
        ];
        return view('admin.spelling_bee.weeks.edit', $data);
    }
    public function weekUpdate($id, Request $request){
    $request->validate([
            'grade' => 'required',
            'week' => 'required',
            'status' => 'required',
        ]);
        $grade = \App\Allweek::find($id);

        $grade->grade_id = $request->grade;
        $grade->week = $request->week;
        $grade->status = $request->status;
        $grade->save();

        return redirect()->route('all_week')->with("success","Data Updated Successfully");
    }
    public function weekdelete(Request $request){
        $week = \App\Allweek::find($request->id);
        if($week->delete()){
            echo json_decode(1);
        }
    }




//Question section

    public function allQuestion(){
        $questions = \App\Question::all();
        return view('admin.spelling_bee.weeks.index')->with('questions', $questions);
    }

    public function questionCreate(){
        $allgrade = \App\Allgrade::all();
        return view('admin.spelling_bee.weeks.add')->with('allgrade', $allgrade);
    }

    public function questionSave(Request $request){
    $request->validate([
            'grade' => 'required',
            'week' => 'required',
            'status' => 'required',
        ]);
        $grade = new \App\Allweek;

        $grade->grade_id = $request->grade;
        $grade->week = $request->week;
        $grade->status = $request->status;
        $grade->save();

        return redirect()->route('all_week')->with("success","Data Inserted Successfully");
    }

    public function questionEdit($id){
        $allgrade = \App\Allgrade::all();
        $all_week = \App\Allweek::find($id);

        $data = [
            'allgrade'=> $allgrade,
            'week'=> $all_week,
        ];
        return view('admin.spelling_bee.weeks.edit', $data);
    }
    public function questionUpdate($id, Request $request){
    $request->validate([
            'grade' => 'required',
            'week' => 'required',
            'status' => 'required',
        ]);
        $grade = \App\Allweek::find($id);

        $grade->grade_id = $request->grade;
        $grade->week = $request->week;
        $grade->status = $request->status;
        $grade->save();

        return redirect()->route('all_week')->with("success","Data Updated Successfully");
    }
    public function questionDelete(Request $request){
        $week = \App\Allweek::find($request->id);
        if($week->delete()){
            echo json_decode(1);
        }
    }
}
