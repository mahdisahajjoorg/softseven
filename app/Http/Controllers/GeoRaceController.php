<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;

class GeoRaceController extends Controller
{
    public function index()
    {
    	$users["data"] = DB::table('georace_contests')->get();
    	return view('admin.Georace.all_level', $users);
    }

    public function add_form()
    {
    	$users["cat"] = DB::table('georace_cats')->get();
    	return view('admin.Georace.add_all_level_q', $users);
    }

    public function store_all_level(Request $request)
    {
        $data =  $request->all();

        $validateData = $request->validate([
	        'status' => 'required',
	        'contest_time' => 'required',
	        'total_number_problem' => 'required'
	    ]);

        $data2["georace_contest_name"] = $data["georace_contest_name"];
        $data2["total_number_problem"] = $data["total_number_problem"];
        $data2["start_date"] = $data["start_date"];
        $data2["contest_time"] = $data["contest_time"];
        $data2["status"] = $data["status"];
        $data2["georace_cat_id"] = $data["category"];
        $data2["created_date"] = date("Y/m/d");
        $data2["modified_date"] = date("Y/m/d");

        $ck = DB::table('georace_cats')->where('georace_cat_id', $data["category"])->first();

        $data2["georace_cat_name"] = $ck->georace_cat_name;

        DB::table('georace_contests')->insert($data2);
         return redirect()->route('question.all_geo_level_view')->with('success_message','Question added successfully!');
    }

    public function edit_all_level($id)
    {
    	$users["cat"] = DB::table('georace_cats')->get();
    	$users["data"] = DB::table('georace_contests')->where('id',$id)->first();
    	return view('admin.Georace.edit_all_level', $users);
    }

    public function update_all_level(Request $request)
    {
    	$data =  $request->all();


        $validateData = $request->validate([
	        'status' => 'required',
	        'contest_time' => 'required',
	        'total_number_problem' => 'required'
	    ]);

        $data2["georace_contest_name"] = $data["georace_contest_name"];
        $data2["total_number_problem"] = $data["total_number_problem"];
        $data2["start_date"] = $data["start_date"];
        $data2["contest_time"] = $data["contest_time"];
        $data2["status"] = $data["status"];
        $data2["georace_cat_id"] = $data["category"];

        $ck = DB::table('georace_contests')->where('georace_cat_id', $data["category"])->first();
        $data2["georace_cat_name"] = $ck->georace_cat_name;

      
        DB::table('georace_contests')->where('id',$data["id"])->update($data2);
        return redirect()->route('question.all_geo_level_view')->with('success_message','Question Updated successfully!');
       
    }

    public function del_al_level(Request $request)
	{
		DB::table('georace_contests')->where('id', $request->id)->delete();
        echo json_decode(1);
	}

	public function show()
	{
		$users["data"] = DB::table('georace_questions')->get();
    	return view('admin.Georace.all_question', $users);
	}

	public function add_ques()
	{
		# code...
	}
}
