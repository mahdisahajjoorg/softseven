<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;
use App\Money_contest;
use App\Money_cat;
use App\Money_question;

class MoneyController extends Controller
{
	public function index()
	{
		$datas = Money_contest::all();
    	return view('admin.money.Money_Qustions', ["data" =>$datas]);
	}

	public function add_form()
	{
		$datas = Money_cat::all();
    	return view('admin.money.money_q_add', ["data" =>$datas]);
	}

	public function store_money_q(Request $request)
	{
		$validateData = $request->validate([
            'money_contest_name' => 'required',
            'total_number_problem' => 'required',
            'start_date' => 'required',
            'contest_time' => 'required',
            'unlock_score' => 'required',
            'status' => 'required',
        ]);

	$data =  $request->all();

    $datas = DB::table('money_cats')->select("money_cat_name")->where("money_cat_id", $data["money_cat_id"])->first();
    $data_insert = new Money_contest();
    // $datas = Money_cat::select("money_cat_name")->where("money_cat_id", $data["money_cat_id"])->first();

    // print_r($datas); die();
	$data_insert["money_cat_name"]= $datas->money_cat_name;
	$data_insert["created_date"]= date("Y/m/d"); 
	$data_insert["modified_date"]= date("Y/m/d"); 
    $data_insert["money_contest_name"]= $data["money_contest_name"];
    $data_insert["total_number_problem"]= $data["total_number_problem"];
    $data_insert["start_date"]= $data["start_date"]; 
    $data_insert["contest_time"]= $data["contest_time"];
    $data_insert["unlock_score"]= $data["unlock_score"];
    $data_insert["status"]= $data["status"]; 
    $data_insert["money_cat_id"]= $data["money_cat_id"];

    $data_insert->save();
	return redirect()->route('question.all_money_level_question_form')->with('success_message','Question added successfully!');

	}

	public function edit_form_ques($id)
	{
        $users["cat"] = Money_cat::all();

		// $users["cat"] = DB::table('money_cats')->get();

        $users["data"] = Money_contest::where('id', $id)->first();
        // print_r($users["data"]); die();

		// $users["data"] = DB::table('money_contests')->where('id', $id)->first();
    	return view('admin.money.edit_money_ques',$users);
	}

	public function update_form_ques(Request $request)
	{
		$data2 =array();
		$data =array();
		$validateData = $request->validate([
            'money_contest_name' => 'required',
            'total_number_problem' => 'required',
            'start_date' => 'required',
            'contest_time' => 'required',
            'unlock_score' => 'required',
            'status' => 'required',
        ]);

        $data =  $request->all();
        $data2 = Money_contest::where('id',$data["id"])->first();

        $data2["money_cat_id"] = $data["money_cat_id"];
        $data2["money_contest_name"] = $data["money_contest_name"];
        $data2["total_number_problem"] = $data["total_number_problem"];
        $data2["start_date"] = $data["start_date"];
        $data2["contest_time"] = $data["contest_time"];
        $data2["unlock_score"] = $data["unlock_score"];
        $data2["status"] = $data["status"];
        $data2["money_contest_name"] = $data["money_contest_name"];
        $data2["modified_date"] = date("Y/m/d");
        $data2["created_date"] = $data["created_date"];

        // print_r($data); die();

        $user = Money_cat::where('money_cat_id', $data["money_cat_id"])->first();
        $data2["money_cat_name"] = $user->money_cat_name;

        if($data2->update()){
            return redirect()->route('question.all_money_level_question_form')->with('success_message','Question Updated successfully!');
        }

        // DB::table('money_contests')->where('id',$data["id"])->update($data2);
    }

	public function del_ques(Request $request)
	{
        $employee = Money_contest::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
	}

	public function show()
	{
        $data["contest_name"] = Money_contest::all();
		// $data["contest_name"] = DB::table('money_contests')->select('*')->get();
        $data["ques"] = Money_question::all();
		// $data["ques"] = Money_question::table('money_questions')->get();
    	return view('admin.money.ques', $data);
	}

	public function money_edit($id)
	{
		$data["img"] = scandir("assets/img/questionimage/thumb/", 1);

        $data["data"] = Money_question::where('id', $id)->first();

		// $data["data"] = DB::table('money_questions')->where('id', $id)->first();
        $data["contest_name"] = Money_contest::all();

		// $data["contest_name"] = DB::table('money_questions')->get();
    	return view('admin.money.edit_money_ques_2', $data);
	}

	public function money_update(Request $request)
	{
        $data =  $request->all();

        $validateData = $request->validate([
            'answer1' => 'required',
            'hint' => 'required'
        ]);

        if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/questionimage/thumb/';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        $data2 = array();
        $data2 = Money_question::where('id',$request->id)->first();
        $data2["money_contest_id"] = $data["contest"];
        $data2["answer1"] = $data["answer1"];
        $data2["hint"] = $data["hint"];
        $data2["id"] = $data["id"];

        if (!empty($data["image"])) {
            $img["image"] = $data["image"];
        }
        else{
            $img["image"] = $data["image_other"];
        }

        if (!empty($img["image"])) {
            $data2["image"] = $img["image"];
            $data2->update();
          // Money_question::table('money_questions')->where('id',$data["id"])->update($data2);
          return redirect()->route('question.all_money_question')->with('success_message','Question Updated successfully!');
        }
        else{
            $data2->update();
          // DB::table('money_questions')->where('id',$data["id"])->update($data2);
          return redirect()->route('question.all_money_question')->with('success_message','Question Updated successfully!');
        }

	}

	public function del_question(Request $request)
	{

        $employee = Money_question::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
	}

	public function add_question_money()
	{
		$data["last"] = DB::table('money_contests')->latest('id')->first();
		$data["img"] = scandir("assets/img/questionimage/thumb/", 1);
  
		return view('admin.money.question_add' , $data);
	}

	public function store_question_money(Request $request)
	{
		$data =  $request->all();
		$validateData = $request->validate([
	        'contest' => 'required',
	        'hint' => 'required',
	        'answer1' => 'required'
	    ]);


	    if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/question/img';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        $data2 = array();
        $data2 = new Money_question();

        $data2["money_contest_id"] = $data["contest"];
        $data2["money_contest_name"] = $data["money_contest_name"];
        $data2["hint"] = $data["hint"];
        $data2["answer1"] = $data["answer1"];
        $data2["money_cat_id"] = $data["money_cat_id"];
        $data2["money_cat_name"] = $data["money_cat_name"];
        $data2["created_date"] = date("Y/m/d");
        

        if (!empty($data["image"])) {
        	$data2["image"] = $data["image"];
        }
        else{
        	$data2["image"] = $data["image_other"];
        }

        

        if (!empty($data2["image"])) {
           if($data2->save()){
            return redirect()->route('question.all_money_question')->with('success_message','Question added successfully!');
        }
          // DB::table('money_questions')->insert($data2);
          // return redirect()->route('question.all_money_question')->with('success_message','Question added successfully!');
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }

	}

	public function del_ques_two(Request $request)
	{

        $employee = Money_question::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
	}

    
}
