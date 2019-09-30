<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use App\Score;
use PDF;

class ScoreController extends Controller
{
    public function index(){
        $certificates = Certificate::all();
        $score = Score::all();
        return view('admin.score.index',['certificates'=>$certificates,'score'=>$score]);
    }

    public function scores_award($cid,$sid){
        $certificate = Certificate::where('id',$cid)->first();
        $score = Score::with('student')->with('school')->where('id',$sid)->first();
        return view('admin.score.award',['certificate'=>$certificate,'score'=>$score]);
    }

    public function score_award_pdf($cid,$sid){
        $certificate = Certificate::where('id',$cid)->first();
        $score = Score::with('student')->with('school')->where('id',$sid)->first();
        $pdf = PDF::loadView('admin.score.award_pdf',['certificate'=>$certificate,'score'=>$score]);
        return $pdf->download($certificate->title.$score->id.'.pdf');
    }
}
