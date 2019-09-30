<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function firstNameList(){
   	 $alluser = \App\Student::get();

   	 return view('admin.firstname.allfirstname')->with('alluser',$alluser);
   }

   public function firstNameEdit($id){
	$user = \App\Student::find($id);
   	 return view('admin.firstname.editfirstname')->with('user',$user);
   }

   public function firstNameUpdate(Request $request, $id){
   	
   	$user = \App\Student::find($id);
   	$user->status = $request->firstname_status;
   	$user->save();

   	return redirect()->route('firstname_list')->with('success','Data Updated Successfully');
   }
}
