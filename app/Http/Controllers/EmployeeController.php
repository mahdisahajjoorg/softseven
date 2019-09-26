<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin_user;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Admin_user::where('type',4)->get();
        return view('admin.employees.index',['employees'=>$employees]);
    }

    public function add_employee_form(){
        return view('admin.employees.add_employee');
    }

    public function add_employee_form_submit(Request $request){
        $validateData = $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'email|unique:admin_users',
            'password' => 'required|min:8'
        ]);
        $employee = new Admin_user();
        $employee->firstname = $request->firstname;
        $employee->type = 4;
        $employee->status = 1;
        $employee->email = $request->email;
        $employee->forget_password_key = '';
        $employee->sponsor = '';
        $employee->lastname = $request->lastname;
        $employee->password = Hash::make($request->password);
        $employee->main_password = $request->password;
        if($employee->save()){
            return redirect()->route('employee.index')->with('success_message','Employee added successfully!');
        }
    }

    public function edit_employee_form($id){
        $employee = Admin_user::where('id',$id)->first();
        return view('admin.employees.edit_employee',['employee'=>$employee]);
    }

    public function edit_employee_form_submit(Request $request){
        $validateData = $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'unique:admin_users,email,'.$request->employee_id,
            'password' => 'required|min:8'
        ]);
        $employee = Admin_user::where('id',$request->employee_id)->first();
        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->main_password = $request->password;
        $employee->password = Hash::make($request->password);
        if($employee->update()){
            return redirect()->route('employee.index')->with('success_message','Employee updated successfully!');
        }
    }

    public function delete_employee(Request $request){
        $employee = Admin_user::where('id',$request->id)->first();
        if($employee->delete()){
            echo json_decode(1);
        }
    }
}
