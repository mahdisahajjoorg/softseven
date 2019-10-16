<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSetting;

class EmailSettingController extends Controller
{
    public function email_setting_form(){
        $email_setting = EmailSetting::first();
        return view('admin.email_setting.setting',['email_setting'=>$email_setting]);
    }

    public function email_setting_form_submit(Request $request){
        $validateData = $request->validate([
            'protocol'=>'required',
            'host'=>'required',
            'port'=>'required',
            'username'=>'required',
            'password'=>'required'
        ]);
        $email_setting = EmailSetting::first();
        $email_setting->protocol = $request->protocol;
        $email_setting->host = $request->host;
        $email_setting->port = $request->port;
        $email_setting->email = $request->username;
        $email_setting->password = $request->password;
        if($email_setting->update()){
            return redirect()->route('email_setting.email_setting_form')->with('success_message','Email Setting updated successfully');
        }
    }
}
