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
                        
                        <a href="{{ route('grandtotal_per_students.index') }}">Grand Totals</a>
                        <!--<a href="grandtotal.php">Grand Total</a>-->
                    </li>
                    <li>
                        <a href="{{route('outer_super.index')}}">Super Contest</a>
                    </li>
					 <li>
                        <a href="{{ route('mobilescores.index') }}">Mobile Scores</a>
                    </li>
                    <li>
                        <a href="{{route('contact.contact_softseven_form')}}">Contact SoftSeven</a>
                    </li>
					<li>
                        <a href="http://softseven.com">Home Page</a>
                    </li>
                    <li>
                        <a href="{{route('extenstion_list')}}">Extension Page</a>
                    </li>
                    <li>
                        <a href="{{route('schoolchampions_list')}}">School Champions</a>
                    </li>
					<li>
                        <a href="{{route('todayschampions_list')}}">Today School Champions</a>
                    </li>
                    <li>
                        <a href="{{route('softsevenchampions_list')}}" class="active">SoftSeven Champions</a>
                    </li>
                    <li>
                        <!--<a href="softsevenchampionslevel.php">SoftSeven Champions by Level</a>-->
                         <a href="{{route('goldstar_list')}}">Gold Star</a>
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
                            <select class="form-control" id="school" name="school_code">
                                <option value="" selected>All</option>
                                @foreach($schools as $school)
                                 <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                @endforeach

                    
                            </select>
                        </div>


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

$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>Date</th><th>Addition</th><th >School Code</th><th>Multiplications</th></tr></thead></table>');

$(document).ready(function () {

    $('body').delegate('#school', 'change', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });


});
</script>

<script type="text/javascript">
 
        oTable = $('#approve_student').DataTable({
            // "language": {
            //   "emptyTable": "There is no school with this schoolcode and password"
            // },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
              "url": "{{ route('softsevenchampions_list') }}",
            },
            "columns": [
                {data: 'created', name: 'created' , orderable: false, searchable: false},
                {data: 'addition',  name: 'addition'},
                {data: 'school_code',  name: 'school_code'},
                {data: 'multiplication',  name: 'multiplication'},

            ]
        });



$(document).on('submit','#grandtotal',function(e){
    $("#table_content").html('');
    e.preventDefault();
        var school = $('#school').val();

$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>Date</th><th>Addition</th><th >School Code</th><th>Multiplications</th></tr></thead></table>');

        oTable = $('#approve_student').DataTable({
            // "language": {
            //   "emptyTable": "There is no school with this schoolcode and password"
            // },

            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {

                "url":"{!!route('softsevenchampions_list')!!}",
                "data":{
                    school
                }
            },
            "columns": [
                {data: 'created', name: 'created' , orderable: false, searchable: false},
                {data: 'addition',  name: 'addition'},
                {data: 'school_code',  name: 'school_code'},
                {data: 'multiplication',  name: 'multiplication'},
            ]
        });

   });





</script>
@endsection