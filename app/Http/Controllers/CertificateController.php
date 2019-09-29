<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;

class CertificateController extends Controller
{
    public function index(){
        $certificates = Certificate::all();
        return view('admin.certificate.index',['certificates'=>$certificates]);
    }

    public function delete_certificate(Request $request){
        $certificate = Certificate::where('id',$request->id)->first();
        if($certificate->delete()){
            echo json_encode(1);
            die();
        }
    }

    public function edit_certificate_form($id){
        $certificate = Certificate::where('id',$id)->first();
        return view('admin.certificate.edit_certificate',['certificate'=>$certificate]);
    }

    public function edit_certificate_form_submit(Request $request){
       dd($request->file('image'));
        $validateData = $request->validate([
            'title'=>'required',
            'type'=>'required'
        ]);
        $certificate = Certificate::where('id',$request->cert_id)->first();
        if($request->type==1){
            $certificate->title = $request->title;
            $certificate->type = $request->type;
            $certificate->jampbage = $request->jumpbage;
            if($request->file('image')){
                $file = $request->file('image');
                $certificate->image_file_name = $file->getClientOriginalName();
                $filename = time()."-".$file->getClientOriginalName();
                $file->move('/assets/upload/certificates/',$filename);
            }
            if($certificate->update()){
                return redirect()->route('certificate.index')->with('success_message','Certificate updated successfully!');
            }
        }
        else if($request->type==2){
            $certificate->title = $request->title;
            $certificate->type = $request->type;
            $certificate->addition = $request->addition;
            $certificate->multiplication = $request->multiplication;
            $certificate->subtraction = $request->subtraction;
            $certificate->division = $request->division;
            $certificate->wordrace = $request->wordrace;
            if($request->file('image')){
                $file = $request->file('image');
                $certificate->image_file_name = $file->getClientOriginalName();
                $filename = time()."-".$file->getClientOriginalName();
                $file->move('/assets/upload/certificates/',$filename);
            }
            if($certificate->update()){
                return redirect()->route('certificate.index')->with('success_message','Certificate updated successfully!');
            }
        }
    }
}
