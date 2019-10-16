<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;
use App\Time_contest;
use App\Time_cat;
use App\Time_question;

class TimeController extends Controller
{
    public function index()
    {
    	$datas = Time_contest::all();
    	return view('admin.Time.level_ques', ["data" =>$datas]);
    }

    public function add_time_level_ques()
    {
    	$datas = Time_cat::all();
    	return view('admin.Time.add_time_level', ["data" =>$datas]);
    }

    public function store_time_level_ques(Request $request)
    {
    	$data =  $request->all();

        $validateData = $request->validate([
	        'status' => 'required',
	        'contest_time' => 'required',
	        'total_number_problem' => 'required',
	        'start_date' => 'required',
	        'time_contest_name'=>'required',
	        'unlock_score'=>'required'
	    ]);

        $data2 = new Time_contest();

	    $data2["status"] = $data["status"];
        $data2["contest_time"] = $data["contest_time"];
        $data2["start_date"] = $data["start_date"];
        $data2["total_number_problem"] = $data["total_number_problem"];
        $data2["time_contest_name"] = $data["time_contest_name"];
        $data2["time_cat_id"] = $data["time_cat_id"];
        $data2["mathmatian_score"] = "0";
        $data2["unlock_score"] = $data["unlock_score"];
        $ck = Time_cat::where('time_cat_id', $data["time_cat_id"])->first();
        $data2["time_cat_name"] = $ck->time_cat_name;
        $data2["created_date"] = date("Y/m/d");
        $data2["modified_date"] = date("Y/m/d");

        if($data2->save()){
           return redirect()->route('question.all_time_question')->with('success_message','Question added successfully!');
        }
        
    }

    public function edit_ques_level($id)
    {
    	$datas["info"] = Time_contest::where('id', $id)->first();
    	$datas["data"] = Time_cat::all();
    	return view('admin.Time.edit_level_ques', $datas);
    }

    public function update_ques_level(Request $request)
    {
    	$data = array();
    	$data2 = array();
    	$data =  $request->all();

    	$validateData = $request->validate([
	        'status' => 'required',
	        'contest_time' => 'required',
	        'total_number_problem' => 'required',
	        'start_date' => 'required',
	        'time_contest_name'=>'required',
	        'unlock_score'=>'required'
	    ]);

        $data2 = Time_contest::where('id',$request->id)->first();

	    $data2["status"] = $data["status"];
        $data2["contest_time"] = $data["contest_time"];
        $data2["start_date"] = $data["start_date"];
        $data2["total_number_problem"] = $data["total_number_problem"];
        $data2["time_contest_name"] = $data["time_contest_name"];
        $data2["time_cat_id"] = $data["time_cat_id"];
        $data2["mathmatian_score"] = "0";
        $data2["unlock_score"] = $data["unlock_score"];

        $ck = Time_cat::where('time_cat_id', $data["time_cat_id"])->first();
        $data2["time_cat_name"] = $ck->time_cat_name;
        $data2["modified_date"] = date("Y/m/d");

        if($data2->update()){
            return redirect()->route('question.all_time_question')->with('success_message','Question Updated successfully!');
        }
          
    }

    public function del_level(Request $request)
	{
        $employee = Time_contest::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
	}

    public function show()
    {
        $datas = Time_question::all();
        return view('admin.Time.all_ques', ["data" =>$datas]);
    }

    public function add_time()
    {
        $data["img"] = scandir("assets/img/questionimage/thumb/", 1);
        $data["data"] = Time_contest::all();
        return view('admin.Time.add_ques',$data);
    }

    public function store_time(Request $request)
    {
        $data =  $request->all();

        $validateData = $request->validate([
            'answer1' => 'required',
            'hint' => 'required'
        ]);

        $data2 = new Time_question();

        $data2["answer1"] = $data["answer1"];
        $data2["time_contest_id"] = $data["contest"];
        $data2["hint"] = $data["hint"];
        $ck = Time_contest::where('id', $data["contest"])->first();

        $data2["time_contest_name"] = $ck->time_contest_name;
        $data2["time_cat_id"] = $ck->time_cat_id;
        $data2["time_cat_name"] = $ck->time_cat_name;
        $data2["created_date"] = date("Y/m/d");

        if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/questionimage/thumb/';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        if (!empty($data["image"])) {
            $data2["image"] = $data["image"];
        }
        else{
            $data2["image"] = $data["image_other"];
        }

        if (!empty($data2["image"])) {
            if($data2->save()){
            return redirect()->route('question.all_time_question_two')->with('success_message','Question added successfully!');
            }
          
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }

        
    }

    public function edit_time_ques($id)
    {
        $data["img"] = scandir("assets/img/questionimage/thumb/", 1);
        $data["data"] = Time_contest::all();
        $data["datas"] = Time_question::where('id', $id)->first();

        return view('admin.Time.edit_ques',$data);
    }

    public function update_time_ques(Request $request)
    {
        $data =  $request->all();

        $validateData = $request->validate([
            'answer1' => 'required',
            'hint' => 'required'
        ]);

        $data2 = Time_question::where('id',$request->id)->first();

        $data2["answer1"] = $data["answer1"];
        $data2["time_contest_id"] = $data["contest"];
        $data2["hint"] = $data["hint"];
        $ck = Time_question::where('id', $data["contest"])->first();

        $data2["time_contest_name"] = $ck->time_contest_name;
        $data2["time_cat_id"] = $ck->time_cat_id;
        $data2["time_cat_name"] = $ck->time_cat_name;

        if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/questionimage/thumb/';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        if (!empty($data["image"])) {
            $img["image"] = $data["image"];
        }
        else{
            $img["image"] = $data["image_other"];
        }
        if (!empty($img["image"])) {
            $data2["image"] = $img["image"];
            if($data2->update()){
            return redirect()->route('question.all_time_question_two')->with('success_message','Question Updated successfully!');
        }
          
        }
        else{

            if($data2->update()){
            return redirect()->route('question.all_time_question_two')->with('success_message','Question Updated successfully!');
        }
        }
    }

    public function del_time_ques(Request $request)
    {
        $employee = Time_question::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
    }
}
