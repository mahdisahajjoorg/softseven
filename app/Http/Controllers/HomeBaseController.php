<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin_user;

class HomeBaseController extends Controller
{
    public function login_form(){
        return view('login');
    }

    public function login_form_submit(Request $request){
        $validateData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $email = $request->email;
        $password = $request->password;
        $check_username = Admin_user::where('email',$email)->first() ;
        if($check_username!=null){
            if(Hash::check($password,$check_username->password)){
                session()->put('user_id',$check_username->id);
                return redirect()->route('school.index');
            }
            else{
                return redirect()->route('home_base.login_form')->with('error_message','Email or Password is incorrect!');
            }
        }   
        else{
            return redirect()->route('home_base.login_form')->with('error_message','Email or Password is incorrect!');
        }
    }

    public function logout(){
        session()->flash('user_id');
        return redirect()->route('home_base.login_form');
    }

}
