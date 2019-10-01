<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response,File;
use Redirect;

class UserController extends Controller
{
   public function __construct()
    {
      ini_set('memory_limit','800M');

    }
   public function firstNameList(){
   	 // $alluser = \App\Student::get();
      $alluser = DB::table('students')->get();

   	 return view('admin.firstname.allfirstname')->with('alluser',$alluser);
   }

   function searchlist($alp){
    $a = "firstname/firstnamelist/edit";
         $date = DATE(date('2016-11-21'));
         $studentsfirstname = DB::table('students')->where('created', '<', $date)->where('is_approved', 1)->where('firstname', 'like', $alp. '%')->get();

         $output ='';
         $output .='<table class="table table-bordered table-striped mb-none" id="datatable-default">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Firstname</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>

                  <tbody>';
          foreach ($studentsfirstname as $key => $value) {
                    $output .='<tr>';
                    $output .='<td> '.$value->id.' </td> ';
                    $output .='<td> '.$value->firstname.' </td>';
                    if ($value->firstname_status==1) {
                      $output .='<td> <button class="btn btn-success">YES</button> </td>';
                    }elseif ($value->firstname_status==0) {
                      $output .='<td><button class="btn btn-warning">NO</button></td>';
                    }else{
                      $output .='<td><button class="btn btn-danger">UNKNOWN</button></td>';
                    }
                    $output .='<td> <a href="'.url($a).'/'.$value->id.'" class="btn btn-primary">Edit</a> </td>';
                    $output .='</tr>';
                  } 
                  $output .='</tbody>
                          </table>';

        $output .='<script type="text/javascript">
                    $(document).ready(function() {
                        //Buttons examples
                        var table = $("#datatable-default").DataTable({
                            lengthChange: true,
                            lengthMenu: [10,25,50,100],          
                        });       
                    } );

                </script>';                        
        print_r($output); 
    }



   public function firstNameEdit($id){
	   $users["user"] = DB::table('students')->where('id', $id)->first();
   	 return view('admin.Firstname.editfirstname', $users);
   }

   public function firstNameUpdate(Request $request, $id){
   	
   	$data =  $request->all();

    $data2["firstname_status"] = $data["firstname_status"];

    DB::table('students')->where('id',$id)->update($data2); 

   	return redirect()->route('firstname_list')->with('success','Data Updated Successfully');
   }
}
