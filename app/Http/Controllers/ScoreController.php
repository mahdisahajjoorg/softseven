<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Certificate;
use App\Score;
use PDF;

class ScoreController extends Controller
{
    public function index(){
        return view('admin.score.index');
    }

    public function score_list(){
        // $certificates = Certificate::all();
        // $score = Score::all();
        // return view('admin.score.index',['certificates'=>$certificates,'score'=>$score]);
            return Datatables::of(Score::query()->get())
             ->addColumn('score_certificate', function(Score $score) {
                if($score->game_name=='auditory' || $score->game_name=='visual')
                $gmnm='wordrace';
                else $gmnm=$score->game_name;
                    $gmlv=$score->game_level;
                    $scoress=$score->score;
                    $certificates = Certificate::all();
                    foreach($certificates as $k=>$v){
                        if($v->$gmnm!=0 && $scoress >= $v->$gmnm){
                          return '<a href="'.route('score.scores_award',['c_id'=>$v->id,'s_id'=>$score->id]).'">'.$v->title.'</a>';
                           
                        }
                    }
                })
             ->addColumn('jump_badge_certificate', function(Score $score) {
                    if($score->game_name=='auditory' || $score->game_name=='visual')
                    $gmnm='wordrace';
                    else $gmnm=$score->game_name;
                        $gmlv=$score->game_level;
                        $scoress=$score->score;
                        $jump_badge=$score->jump_badge;
                        $certificates = Certificate::all();

                        foreach($certificates as $k=>$v){//debug($v);
                          //echo   key($v['Certificate']).'<br>';
                           if($jump_badge >= $v->jampbage && $v->jampbage != 0 && $v->type == 2){
                               return '<a href="'.route('score.scores_award',['c_id'=>$v->id,'s_id'=>$score->id]).'">'.$v->title.'</a>';
                            }
                         }
                })
                ->rawColumns(['score_certificate', 'jump_badge_certificate'])    
                ->make(true);
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
