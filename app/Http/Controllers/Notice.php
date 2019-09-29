<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;

class Notice extends Controller
{
    public function index()
    {
    	return view('admin.Notice.notice');
    }
    public function store(Request $request)
    {
    	$data = array();
    	$data =  $request->all();
    	$data2["message"] = $data["message"];

    	$validateData = $request->validate([
            'message' => 'required'
        ]);
        DB::table('notices')->insert($data2);
        return redirect()->route('ques_w.show_notice')->with('success_message','Question added successfully!');
    }

    public function show()
    {
    	$data["data"] = DB::table('notices')->get();
    	return view('admin.Notice.show_notices', $data);
    }
    public function del(Request $request)
    {
    	DB::table('notices')->where('id', $request->id)->delete();
        echo json_decode(1);
    }
}
