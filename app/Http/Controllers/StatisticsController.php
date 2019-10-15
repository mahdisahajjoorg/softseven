<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Student;
use \App\School;
use \App\Game;
use \App\Score;
use \App\Appscore;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index(){

    	$data = [
    		'student_count_alltime'  => Student::count(),
    		'student_count_thismonth'=> Student::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->count(),
    		'student_count_tody'	 => Student::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    		'school_count_alltime'	 => School::count(),
    		'school_count_thismonth' => School::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->count(),
    		'school_count_tody'		 => School::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    		'game_count_alltime'=>Score::count(),
    		'game_count_thismonth'=>Score::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->count(),
    		'game_count_tody'=>Score::whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    		'addition_game_count_alltime'=>Score::where('game_name','addition')->count(),
    		'addition_game_count_thismonth'=>Score::where('game_name','addition')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->count(),
    		'addition_game_count_tody'=>Score::where('game_name','addition')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    		'mul_game_count_alltime'=>Score::where('game_name','multiplication')->count(),
    		'mul_game_count_thismonth'=>Score::where('game_name','multiplication')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->count(),
    		'mul_game_count_tody'=>Score::where('game_name','multiplication')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),


    		'supercontest_addition_grand_total'=>Score::where('game_name','addition')->where('supercontest_id','!=','')->sum('score'),
    		'supercontest_addition_grand_total_thismonth'=>Score::where('game_name','addition')->where('supercontest_id','!=','')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'supercontest_addition_grand_total_today'=>Score::where('game_name','addition')->where('supercontest_id','!=','')->where('game_name','multiplication')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->sum('score'),


    		'supercontest_multiplication_grand_total'=>Score::where('game_name','multiplication')->where('supercontest_id','!=','')->sum('score'),
    		'supercontest_multiplication_grand_total_thismonth'=>Score::where('game_name','multiplication')->where('supercontest_id','!=','')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'supercontest_multiplication_grand_total_today'=>Score::where('game_name','multiplication')->where('supercontest_id','!=','')->where('game_name','multiplication')->whereYear('created',Carbon::now()->year)
    								   ->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->sum('score'),



 //mobile game
 
    		'mobile_game'=>Appscore::count(),
    		'mobile_game_thismonth'=>Appscore::whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_today'=>Appscore::whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),
 //mobile game addition
 
    		'mobile_game_addition'=>Appscore::where('game_name','addition')->count(),
    		'mobile_game_addition_thismonth'=>Appscore::where('game_name','addition')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_addition_today'=>Appscore::where('game_name','addition')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

   //mobile game multiplication
 
    		'mobile_game_multiplication'=>Appscore::where('game_name','multiplication')->count(),
    		'mobile_game_multiplication_thismonth'=>Appscore::where('game_name','multiplication')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_multiplication_today'=>Appscore::where('game_name','multiplication')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

   //mobile game subtraction
 
    		'mobile_game_subtraction'=>Appscore::where('game_name','subtraction')->count(),
    		'mobile_game_subtraction_thismonth'=>Appscore::where('game_name','subtraction')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_subtraction_today'=>Appscore::where('game_name','subtraction')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),


    //mobile game division
 
    		'mobile_game_division'=>Appscore::where('game_name','division')->count(),
    		'mobile_game_division_thismonth'=>Appscore::where('game_name','division')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_division_today'=>Appscore::where('game_name','division')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    //mobile game wordrace
 
    		'mobile_game_wordrace'=>Appscore::where('game_name','wordrace')->count(),
    		'mobile_game_wordrace_thismonth'=>Appscore::where('game_name','wordrace')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->sum('score'),
    		'mobile_game_wordrace_today'=>Appscore::where('game_name','wordrace')->whereYear('created',Carbon::now()->year)->whereMonth('created', Carbon::now()->month)->whereDay('created',Carbon::now()->day)->count(),

    	];
    	return view('admin.statistic.index', $data);
    }
}
