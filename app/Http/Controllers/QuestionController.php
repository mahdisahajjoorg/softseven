<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;

class QuestionController extends Controller
{
	public function index()
    {
      $datas = DB::table('questions')->get();
      // print_r($datas); die();
    	return view('admin.Question.w_question', ["data" =>$datas]);
    }

    public function Word_race_settings()
    {
    	$users = DB::table('wordracesettings')->get();
    	return view('admin.Question.Word_race_set', ["data" =>$users]);
    }

    public function Word_race_settings_edit($id)
    {
      $users["img"] = DB::table('wordracesettings')->select('image')->get();
    	$users["data"] = DB::table('wordracesettings')->where('id', $id)->first();
    	return view('admin.Question.edit_ques', $users);
    }

    public function Word_race_settings_update(Request $request)
    {
      $data =  $request->all();

      $validateData = $request->validate([
            'color' => 'required'
        ]);

      if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/levels/';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        $data2 = array();
        $data2["level_data"] = $data["level_data"];
        $data2["color"] = $data["color"];
       

        if (!empty($data["image"])) {
            $data2["image"] = $data["image"];
        }
        else{
            $data2["image"] = $data["image_other"];
        }

        if (!empty($data2["image"])) {
          DB::table('wordracesettings')->where('id',$data["id"])->update($data2);
          return redirect()->route('question.ques_settions_form')->with('success_message','Question Updated successfully!');
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }

    	$users = DB::table('wordracesettings')->where('id', $id)->first();
    	return view('admin.Question.edit_ques', ["data" =>$users]);
    }
    public function add_ques()
    {
      $users["img"] = scandir("assets/img/questionimage/thumb/", 1);
    	return view('admin.Question.add_question',$users);
    }
    public function store(Request $request)
    {
    	$data = array();
    	$data =  $request->all();

      $validateData = $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'questionmp3' => 'required',
            'hintmp3' => 'required',
        ]);

    	if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/questionimage/thumb';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        if ($hintmp3=$request->file('hintmp3')) {
           $uploadPath = 'assets/files/hintmp3';

           $file_name = time()."-".$hintmp3->getClientOriginalName();

           $dbUrl = $uploadPath."/".$file_name;
           $hintmp3->move($uploadPath,$dbUrl);
       
            $data['hintmp3']= $file_name;
            
     
        }

        if ($questionmp3=$request->file('questionmp3')) {
           $uploadPath = 'assets/files/questionmp3';

           $file_name = time()."-".$questionmp3->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
           $questionmp3->move($uploadPath,$dbUrl);
   
            $data['questionmp3']= $file_name;
         
        }

        $data2 = array();
        $data2["game_id"] = $data["game_id"];
        $data2["game_level"] = $data["game_level"];
        $data2["answer1"] = $data["answer1"];
        $data2["answer2"] = $data["answer2"];
        $data2["answer3"] = $data["answer3"];
        $data2["answer4"] = $data["answer4"];
        $data2["questionmp3"] = $data["questionmp3"];
        $data2["hintmp3"] = $data["hintmp3"];
       

        if (!empty($data["image"])) {
        	$data2["image"] = $data["image"];
        }
        else{
        	$data2["image"] = $data["image_other"];
        }

        $data2["created"] = date("Y-m-d");
        $data2["modified"] = date("Y-m-d");

        if (!empty($data2["image"])) {
          DB::table('questions')->insert($data2);
          return redirect()->route('question.add_question_form')->with('success_message','Question added successfully!');
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }

    }

    public function Word_race_question_edit($id)
    {

        $users["img"] = DB::table('questions')->select('image')->get();
        $users["data"] = DB::table('questions')->where('id', $id)->first();
        return view('admin.Question.w_edit_ques', $users);

    }

    public function Word_race_question_update(Request $request)
    {
        $data =  $request->all();

        

        $validateData = $request->validate([
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'questionmp3' => 'required',
            'hintmp3' => 'required',
        ]);
        
        if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/question/img';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $dbUrl;
         
        }

        if ($hintmp3=$request->file('hintmp3')) {
           $uploadPath = 'assets/question/audio';

           $file_name = time()."-".$hintmp3->getClientOriginalName();

           $dbUrl = $uploadPath."/".$file_name;
           $hintmp3->move($uploadPath,$dbUrl);
       
            $data['hintmp3']= $dbUrl;
           
            
     
        }

        if ($questionmp3=$request->file('questionmp3')) {
           $uploadPath = 'assets/question/audio';

           $file_name = time()."-".$questionmp3->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
           $questionmp3->move($uploadPath,$dbUrl);
   
            $data['questionmp3']= $dbUrl;
             
         
        }

        $data2 = array();
        $data2["game_id"] = $data["game_id"];
        $data2["game_level"] = $data["game_level"];
        $data2["answer1"] = $data["answer1"];
        $data2["answer2"] = $data["answer2"];
        $data2["answer3"] = $data["answer3"];
        $data2["answer4"] = $data["answer4"];
        $data2["questionmp3"] = $data["questionmp3"];
        $data2["hintmp3"] = $data["hintmp3"];
       

        if (!empty($data["image"])) {
            $data2["image"] = $data["image"];
        }
        else{
            $data2["image"] = $data["image_other"];
        }

        $data2["created"] = date("Y-m-d");
        $data2["modified"] = date("Y-m-d");

        if (!empty($data2["image"])) {
          DB::table('questions')->where('id',$data["id"])->update($data2);
          return redirect()->route('question.question')->with('success_message','Question Updated successfully!');
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }
        
    }

    public function delete_w_ques(Request $request){

        DB::table('questions')->where('id', $request->id)->delete();
        echo json_decode(1);
    }

    public function add_set_ques()
    {
      $users["img"] = DB::table('wordracesettings')->select('image')->get();
      return view('admin.Question.wr_set_add', $users);
    }

    public function store_set_question(Request $request)
    {
      $data =  $request->all();

      $validateData = $request->validate([
            'color' => 'required'
        ]);

      if ($image=$request->file('image')) {
 
           $uploadPath = 'assets/img/levels/';
           
           $file_name = time()."-".$image->getClientOriginalName();
           $dbUrl = $uploadPath."/".$file_name;
       
           $image->move($uploadPath,$dbUrl);
      
            $data['image']= $file_name;
         
        }

        $data2 = array();
        $data2["level_data"] = $data["level_data"];
        $data2["color"] = $data["color"];
       

        if (!empty($data["image"])) {
            $data2["image"] = $data["image"];
        }
        else{
            $data2["image"] = $data["image_other"];
        }

        if (!empty($data2["image"])) {
          DB::table('wordracesettings')->insert($data2);
          return redirect()->route('question.set_add')->with('success_message','Question added successfully!');
        }
        else{
          return Redirect::back()->with('success_message', 'You must select one Image');
        }  
    }

    public function delete_w_setting_ques(Request $request){

        DB::table('wordracesettings')->where('id', $request->id)->delete();
        echo json_decode(1);
    }

}
