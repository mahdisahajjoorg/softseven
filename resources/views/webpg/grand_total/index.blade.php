@extends('master_webpg')

@section('title','Super Contest')

@section('css_js_up')
<style>
table#example tr th:nth-child(3) {
min-width: 240px !important;
}
table#example tr th:nth-child(4) {
min-width: 125px !important;
}
</style>
@endsection

@section('nav')
<nav style="margin-bottom:25px;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="color: red; font-size: 33px; line-height: 60px;" class="navbar-brand imgband" href="index.php">SuperContest - Multiplication - Einstein</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul  class="nav navbar-nav menu">
                    <li>
                        <a href="{{ route('total_schools.index') }}">Student List</a>
                    </li>
                    <li>
                        <a href="{{ route('top_schools.index') }}">Top Schools</a>
                    </li>
                    <!--<li>
                        <a href="highsore.php">High Scores</a>
                    </li>-->
                   <!--<li>
                        <a href="jumpbadge.php">Jump Badges</a>
                    </li>-->
                   <li>
                        <a href="{{ route('grandtotal_per_students.index') }}"  class="active">Grand Totals</a>
                    </li>
                    <li>
                        <a href="{{route('outer_super.index')}}">Super Contest</a>
                    </li>
					 <li>
                        <a href="mobilescores.php">Mobile Scores</a>
                    </li>
                    <li>
                        <a href="addschool.php">Contact SoftSeven</a>
                    </li>
		            <li>
                        <a href="http://softseven.com">Home Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div style="margin-top: 50px;"></div>
<style>
    .menu li a{
        color: yellow !important;
        font-size: 18px;
    }
    .imgband{
        padding: 2px 15px !important;
    }
	.active{
		border-bottom: 2px solid yellow;
		padding-bottom:2px !important;
	}
</style>
<script>
$(document).ready(function () {
$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("nav ul a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
});
});
</script>
@endsection

@section('main_content')

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-2">
                        <form id="grandtotal">
                        <div class="form-group">
                            <label for="usr">Game Type:</label>
                            <select class="form-control" id="game_type" name="game_type">
                                @foreach($games as $key=>$game)
                                 <option value="{{ $key }}">{{ $game }}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="usr">Options:</label>
                            <select class="form-control" id="options" name="options">
                                <option value="today">Today</option>
                                <option value="thismonth">This Month</option>            
                                <option value="thisyear">This Year</option>            
                                <option value="lastmonth">Last Month</option>            
                                <option value="lastyear">Last Year</option>            
                                <option value="alltime" selected>All Time</option>            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">State:</label>
                          <select class="form-control" id="state" name="state">
                               <option value="">All State</option>
                               @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                          
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usr">School:</label>
                          <select class="form-control" id="school" name="school">
                               <option value="">All Schools</option>
                               @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!--<button type="submit" name="data[submit]" class="btn btn-default">Submit</button>-->

                </div>
                </form>
                <div class="col-md-9">
                    <div class="row">

                    </div>
                    <br>
                    <div id="table_content"></div>
                </div>

            </div>

        </div>
        <!-- /.container -->
@endsection

@section('css_js_down')
<script type="text/javascript">

$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>Rank</th><th>Student Name</th><th >School Name</th><th>City, State</th><th>Grand Total</th></tr></thead></table>');


$(document).ready(function () {

    $('body').delegate('#options', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });
    $('body').delegate('#game_type', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });
    $('body').delegate('#state', 'change', function (e) {
        e.preventDefault();
        var state = $('#state').val();
        $('#school').html('');
         $.ajax({
                url: "get_school_by_state",
                type: "post",
                data: {'_token':'{{ csrf_token() }}',state} ,
                success: function (response) {
                        $('#school').html(response);
                   // You will get response from your PHP page (what you echo or print)
                }

            });
        $("#grandtotal").submit();
    });
    $('body').delegate('#school', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });
});
</script>

<script type="text/javascript">
    var oTable;

    $(document).ready(function() {

        oTable = $('#approve_student').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
              "url": "{{ route('grandtotal_per_students_list') }}",
            },
            "columns": [
                {data: 'score',  name: 'score'},
                {data: 'student_name',  name: 'student_name'},

                {data: 'school_name',  name: 'school_name'},
                {data: 'city',  name: 'city'},
                {data: 'grand_total',  name: 'grandtotal'},
            ]
        });



$(document).on('submit','#grandtotal',function(e){
    $("#table_content").html('');
    e.preventDefault();
        var game_type = $('#game_type').val();
        var game_name = $('#game_nameoptions').val();
        var options = $('#options').val();
        var state = $('#state').val();
        var school = $('#school').val();

$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>Rank</th><th>Student Name</th><th >School Name</th><th>City, State</th><th>Grand Total</th></tr></thead></table>');

        oTable = $('#approve_student').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {

                "url":"{!!route('grandtotal_per_students_list')!!}",
                "data":{
                    game_type, game_name, options, state, school
                }
            },
            "columns": [
                {data: 'score',  name: 'score'},
                {data: 'student_name',  name: 'student_name'},

                {data: 'school_name',  name: 'school_name'},
                {data: 'city',  name: 'city'},
                {data: 'grand_total',  name: 'grandtotal'},
            ]
        });

   });
});
</script>
@endsection