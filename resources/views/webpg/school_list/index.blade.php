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
                        <a href="{{ route('total_schools.index') }}" class="active">Student List</a>
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
                        <a href="{{route('extensionpage.index')}}">Extension Page</a>
                    </li>
                    <li>
                        <a href="{{route('schoolchampions.index')}}">School Champions</a>
                    </li>
					<li>
                        <a href="{{route('todayschampions.index')}}">Today School Champions</a>
                    </li>
                    <li>
                        <a href="{{route('softsevenchampions.index')}}">SoftSeven Champions</a>
                    </li>
                    <li>
                        <!--<a href="softsevenchampionslevel.php">SoftSeven Champions by Level</a>-->
                         <a href="{{route('goldstar.index')}}">Gold Star</a>
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
                            <label for="usr">School Code:</label>
                            <select class="form-control" id="school_code" name="school_code">
                                @foreach($schools as $school)
                                 <option value="{{ $school->school_code }}">{{ $school->school_code }}</option>
                                @endforeach
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="usr">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                 <button type="submit" id="submit_btn" class="btn btn-default">Submit</button>
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

        <div class="bd-example">
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">All Scores</h4>
        </div>
        <div class="modal-body">
           
        </div>
         
      </div>
    </div>
  </div>

</div>
        <!-- /.container -->
@endsection

@section('css_js_down')
<script type="text/javascript">

$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>First Name</th><th>Last Name</th><th >Screen name</th><th>Grade</th><th>Action</th></tr></thead></table>');


$(document).ready(function () {

    $('body').delegate('#submit_btn', 'click', function (e) {
        e.preventDefault();
        $("#grandtotal").submit();
    });

});
</script>

<script type="text/javascript">
    var oTable;

    $(document).ready(function() {

        oTable = $('#approve_student').DataTable({
            "language": {
              "emptyTable": "There is no school with this schoolcode and password"
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
              "url": "{{ route('total_school_list') }}",
              "success":function(data){
                   if(data == 1){
                    $("#table_content").html('');
                    $("#table_content").html('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">×</a>Select your school code and give password to see your students of your school </div>');
                   }
                }
            },
            "columns": [
                {data: 'firstname',  name: 'firstname'},
                {data: 'lastname',  name: 'lastname'},

                {data: 'screen_name',  name: 'screen_name'},
                {data: 'grade',  name: 'grade'},

                {data: 'action',  name: 'action', orderable: false, searchable: false},
            ],


                {data: 'action',  name: 'action'},
            ]

        });



$(document).on('submit','#grandtotal',function(e){
    $("#table_content").html('');
    e.preventDefault();
        var school_code = $('#school_code').val();
        var password = $('#password').val();


$("#table_content").html('<table class="table table-bordered table-striped mb-none" id="approve_student"><thead><tr><th>First Name</th><th>Last Name</th><th >Screen name</th><th>Grade</th><th>Action</th></tr></thead></table>');

        oTable = $('#approve_student').DataTable({
            "language": {
              "emptyTable": "There is no school with this schoolcode and password"
            },
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {

                "url":"{!!route('total_school_list')!!}",
                "data":{
                    school_code, password
                }
            },
            "columns": [
                {data: 'firstname',  name: 'firstname'},
                {data: 'lastname',  name: 'lastname'},

                {data: 'screen_name',  name: 'screen_name'},
                {data: 'grade',  name: 'grade'},
                {data: 'action',  name: 'action', orderable: false, searchable: false},
            ]
        });

   });
});


function updateStudent(id){
    var url = "{{route('school_list.get_student',':id')}}";
    url = url.replace(':id',id);
    $.ajax({
        url:url,
        dataType: "json",
        success:function(result){
            var status = result.is_approved;
            form = '<label>Grade</label>';
            form += '<input type="text" value="'+result.grade+'" id="grade" name="grade" class="form-control"><br>';
            form += '<label>Status</label><br>';
            if(status==1){
                form +='<input type="radio" value="1" id="status" name="status" checked>Active ';
                form +='<input id="status" type="radio" value="0" name="status"> Deactive ';
            }else{
                form +='<input type="radio" value="1" id="status" name="status" >Active ';
                form +='<input id="status" type="radio" value="0" name="status" checked> Deactive ';
            }
            form +='<button type="button" id="update_student" onclick="updateStudentSubmit('+result.id+')" class="btn btn-default">Update</button><input type="hidden" id="school_id" value="'+result.id+'">';
            $('.modal-body').html(form);
            $('#exampleModal').modal('show');
        }
        });
}

function updateStudentSubmit(id){
    var grade = $('#grade').val();
    var status = $('input[name="status"]:checked').val();
    $.ajax({
        url:"{{route('school_list.update_student')}}",
        type: "POST",
        data: {id:id,status:status,grade:grade,"_token":"{{csrf_token()}}"},
        dataType: "json",
        success:function(result){
            if(result==1){
             $('#exampleModal').modal('hide');
             alert('Student updated successfully!');
             oTable.draw();
            }
        }
        });
}


</script>
@endsection