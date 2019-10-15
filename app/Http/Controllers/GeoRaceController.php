<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;
use App\Georace_contest;
use App\Georace_cat;
use App\Georace_question;

class GeoRaceController extends Controller
{
    public function index()
    {
    	$users["data"] = Georace_contest::all();
    	return view('admin.Georace.all_level', $users);
    }

    public function add_form()
    {
    	$users["cat"] = Georace_cat::all();
    	return view('admin.Georace.add_all_level_q', $users);
    }

    public function store_all_level(Request $request)
    {
        $data =  $request->all();

        // print_r($data); die();

        $validateData = $request->validate([
	        'status' => 'required',
	        'contest_time' => 'required',
	        'total_number_problem' => 'required'
	    ]);

        $data2 = new Georace_contest();
        $data2->georace_contest_name = $request->georace_contest_name;
        $data2->total_number_problem = $request->total_number_problem;
        $data2->start_date = $request->start_date;
        $data2->contest_time = $request->contest_time;
        $data2->status = $request->status;
        $data2->georace_cat_id = $request->category;

        $data2->created_date  = date("Y/m/d");
        $data2->modified_date = date("Y/m/d");
        

        // $data2["georace_contest_name"] = $data["georace_contest_name"];
        // $data2["total_number_problem"] = $data["total_number_problem"];
        // $data2["start_date"] = $data["start_date"];
        // $data2["contest_time"] = $data["contest_time"];
        // $data2["status"] = $data["status"];
        // $data2["georace_cat_id"] = $data["category"];
        // $data2["created_date"] = date("Y/m/d");
        // $data2["modified_date"] = date("Y/m/d");

        $ck = Georace_cat::where('georace_cat_id', $data["category"])->first();

        $data2["georace_cat_name"] = $ck->georace_cat_name;

        if($data2->save()){
            return redirect()->route('question.all_geo_level_view')->with('success_message','Question added successfully!');
        }

        // DB::table('georace_contests')->insert($data2);
        //  return redirect()->route('question.all_geo_level_view')->with('success_message','Question added successfully!');
    }

    public function edit_all_level($id)
    {
        $users["cat"] = Georace_cat::all();
        $users["data"] = Georace_contest::where('id', $id)->first();
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

        $data2 = Georace_contest::where('id',$data["id"])->first();

        $data2->georace_contest_name = $request->georace_contest_name;
        $data2->total_number_problem = $request->total_number_problem;
        $data2->start_date = $request->start_date;
        $data2->contest_time = $request->contest_time;
        $data2->status = $request->status;
        $data2->georace_cat_id = $request->georace_cat_id;

        // $data2["georace_contest_name"] = $data["georace_contest_name"];
        // $data2["total_number_problem"] = $data["total_number_problem"];
        // $data2["start_date"] = $data["start_date"];
        // $data2["contest_time"] = $data["contest_time"];
        // $data2["status"] = $data["status"];
        // $data2["georace_cat_id"] = $data["category"];

        $ck = Georace_contest::where('georace_cat_id', $data["category"])->first();

        // $ck = DB::table('georace_contests')->where('georace_cat_id', $data["category"])->first();
        $data2["georace_cat_name"] = $ck->georace_cat_name;

        if($data2->update()){
            return redirect()->route('question.all_geo_level_view')->with('success_message','Question Updated successfully!');
        }

      
        // DB::table('georace_contests')->where('id',$data["id"])->update($data2);
        // return redirect()->route('question.all_geo_level_view')->with('success_message','Question Updated successfully!');
       
    }

    public function del_al_level(Request $request)
	{
        $employee = Georace_contest::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
	}

	public function show()
	{
        $users["data"] = Georace_question::all();
    	return view('admin.Georace.all_question', $users);
	}

	public function add_ques()
	{
        $users["img"] = scandir("assets/img/questionimage/thumb/", 1);
        $users["data"] = Georace_contest::all();

        return view('admin.Georace.add_geo_ques', $users);
	}
    public function store_ques(Request $request)
    {
        $data = array();
        $data2 =array();
        $data =  $request->all();
        $data2 = new Georace_question();

        $validateData = $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'hint' => 'required'
        ]);

        $data2["answer1"] = $data["answer1"];
        $data2["answer2"] = $data["answer2"];
        $data2["answer3"] = $data["answer3"];
        $data2["answer4"] = $data["answer4"];

        if ( $data2["answer1"] != $data2["answer2"] && $data2["answer1"] !=$data2["answer3"] && $data2["answer1"] != $data2["answer4"] ) {
            $data2["hint"] = $data["hint"];
            $data2["georace_contest_id"] = $data["contest"];

            $ck = Georace_contest::where('id', $data["contest"])->get();

            // $ck = DB::table('georace_contests')->where('id', $data["contest"] )->get();
         
            $data2->georace_cat_id = $ck[0]->georace_cat_id;
            $data2->georace_cat_name = $ck[0]->georace_cat_name;
            $data2->georace_contest_name = $ck[0]->georace_contest_name;
            $data2->created_date = date("Y/m/d"); 

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
                $data2->save();
              return redirect()->route('question.all_geo_q_view')->with('success_message','Question Inserted successfully!');
            }
            else{
              return Redirect::back()->with('errors_message', 'You must select one Image');
            }
        }else{
            return Redirect::back()->with('errors_message', 'Error! Correct Answer cant be duplicated');
        }
        
    }

    public function geo_edit($id)
    {
        $users["data"] = Georace_question::where('id', $id)->first();
        $users["img"] = scandir("assets/img/questionimage/thumb/", 1);
        $users["data2"] = Georace_contest::all();
        return view('admin.Georace.edit_geo_ques', $users);
    }

    public function update_geo(Request $request)
    {
        $data = array();
        $data2 =array();
        $data  =  $request->all();

        $validateData = $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'hint' => 'required'
        ]);

        $data2["answer1"] = $data["answer1"];
        $data2["answer2"] = $data["answer2"];
        $data2["answer3"] = $data["answer3"];
        $data2["answer4"] = $data["answer4"];
        $data2["hint"] = $data["hint"];

        if ( $data2["answer1"] != $data2["answer2"] && $data2["answer1"] !=$data2["answer3"] && $data2["answer1"] != $data2["answer4"] ) {
            $data2["georace_contest_id"] = $data["contest"];
            $ck = Georace_contest::where('id', $data["contest"] )->get();
            // $ck = DB::table('georace_contests')->where('id', $data["contest"] )->get();
         
            $data2["georace_cat_id"] = $ck[0]->georace_cat_id;
            $data2["georace_cat_name"] = $ck[0]->georace_cat_name;
            $data2["georace_contest_name"] = $ck[0]->georace_contest_name;

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

                $data2 = Georace_question::where('id',$data["id"])->first();
                $data2->update();
                return redirect()->route('question.all_geo_q_view')->with('success_message','Question Updated successfully!');
            }
            else{
                $data2 = Georace_question::where('id',$data["id"])->first();
                $data2->update();
                return redirect()->route('question.all_geo_q_view')->with('success_message','Question Updated successfully!');
            }
        }else{
            return Redirect::back()->with('errors_message', 'Error! Correct Answer cant be duplicated');
        }
    }

    public function del_geo_ques(Request $request)
    {
        $employee = Georace_question::where('id',$request->id)->first();
        
        if($employee->delete()){
            echo json_decode(1);
        }
    }
}
