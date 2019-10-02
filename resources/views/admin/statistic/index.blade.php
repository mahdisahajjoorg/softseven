@extends('master')

@section('title','Approved Students')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Statistics</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Statistic</span></li>
            <li><span>Index</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<section class="content-body" role="main">

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <!--<a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a> -->
        </div>

       

        <div class="row ">
            <div class="col-md-3">
                <label> <h2 class="panel-title">SoftSeven Statistics</h2></label>
            </div>
            <div class="col-md-3">
                <label style="float: right;"> <h2 class="panel-title">All Time</h2></label>
            </div> 
            <div class="col-md-3">
                <label style="float: right;"> <h2 class="panel-title">This Month</h2></label>
            </div>
            <div class="col-md-3">
                <label style="float: right;"> <h2 class="panel-title">Today</h2></label>
            </div>

        </div>

    </header>
    <div class="panel-body">
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Students</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $student_count_alltime }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $student_count_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $student_count_tody }}</label>
            </div>
        </div>
      
    <div class="row boldcls">
            <div class="col-md-3">
                <label>Schools</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $school_count_alltime }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $school_count_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $school_count_tody }}</label>
            </div>

        </div><br><br>
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Number of Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $game_count_alltime }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $game_count_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $game_count_tody }}</label>
            </div>
        </div> 
        
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Addition Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $addition_game_count_alltime }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $addition_game_count_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $addition_game_count_tody }}</label>
            </div>
        </div>
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Multiplication Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mul_game_count_alltime }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mul_game_count_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mul_game_count_tody }}</label>
            </div>
        </div><br><br>
    <div class="row boldcls">
            <div class="col-md-3">
                <label>Addition Grand Totals</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_addition_grand_total }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_multiplication_grand_total_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_multiplication_grand_total_today }}</label>
            </div>
     </div>
    <div class="row boldcls">
            <div class="col-md-3">
                <label>Multiply Grand Totals</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_multiplication_grand_total }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_multiplication_grand_total_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $supercontest_multiplication_grand_total_today }}</label>
            </div>
        </div>
    </div>
</section>
<br><br>
<section class="panel">
    <div class="panel-body">
         <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_today }}</label>
            </div>
        </div>
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Add Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_addition }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_addition_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_addition_today }}</label>
            </div>
        </div>
        <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Multiply Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_multiplication }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_multiplication_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_multiplication_today }}</label>
            </div>
        </div>

        <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Substract Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_subtraction }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_subtraction_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_subtraction_today }}</label>
            </div>
        </div>

         <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Divide Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_division }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_division_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_division_today }}</label>
            </div>
        </div>

        <div class="row boldcls">
            <div class="col-md-3">
                <label>Mobile Wordrace Games</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_wordrace }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_wordrace_thismonth }}</label>
            </div>
            <div class="col-md-3">
                <label style="float: right;">{{ $mobile_game_wordrace_today }}</label>
            </div>
        </div>

    </div>
</section>                </section>
@endsection

@section('css_js_down')

@endsection