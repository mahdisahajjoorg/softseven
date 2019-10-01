<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\Student;
use DB;
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

   public function uniqueFirstName(){
      return view('admin.firstname.uniquefirstname');
   }

   public function uniqueFirstNameList(){


             return Datatables::of(Student::query()->where('is_approved',1)->groupBy('firstname'))

             ->editColumn('is_approved', function(Student $st) {
               if($st->is_approved ==1){
                  $btn = '<button class="btn btn-success">YES</button>';
               }else{
                  $btn = '<button class="btn btn-danger">No</button>';
               }

               return $btn;
                })
             ->editColumn('action', function(Student $st) {
                  $yes = $st->is_approved==1?'checked':'';
                  $no = $st->is_approved==0?'checked':'';
                  return '<input type="radio" name="'.$st->id.'" value="1" '.$yes.'> Yes   <input type="radio" name="'.$st->id.'" value="0" '.$no.'> No';
                })
             ->escapeColumns([])->make(true);
   }

   public function change_student_status(Request $request){

         foreach ($request->data as $key => $value) {
           $student = \App\Student::find(key($value));
           $student->is_approved = $value[key($value)];
           $student->save();
         }

         echo "done";
   }
}
