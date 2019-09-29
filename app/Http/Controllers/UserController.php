<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function firstNameList(){
   	 $alluser = \App\Admin_user::all();

   	 return view('admin.firstname.allfirstname')->with('alluser',$alluser);
   }

   public function firstNameEdit($id){
	$user = \App\Admin_user::find($id);
   	 return view('admin.firstname.editfirstname')->with('user',$user);
   }

   public function firstNameUpdate(Request $request, $id){
   	
   	$user = \App\Admin_user::find($id);
   	$user->status = $request->firstname_status;
   	$user->save();

   	return redirect()->route('firstname_list')->with('success','Data Updated Successfully');
   }
}
