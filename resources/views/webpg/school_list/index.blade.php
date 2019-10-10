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
            },
            "columns": [
                {data: 'firstname',  name: 'firstname'},
                {data: 'lastname',  name: 'lastname'},

                {data: 'screen_name',  name: 'screen_name'},
                {data: 'grade',  name: 'grade'},
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
                {data: 'action',  name: 'action'},
            ]
        });

   });
});



$(document).on("click","#save_student",function(){
                    if($("#grade").val() ==""){
                        $("#nograde").show();
                    }
                    else{
                        $("#nograde").hide();
                        var student={'id':$("#id").val(),'grade':$("#grade").val(),'is_approved':$("#status:checked").val()};
                        
                        $.ajax({
                                url:"updatestudent.php",
                                type:'POST',
                                data:student,
                                success:function(result){
                                    $(".modal-body").html("");
                                    $('#exampleModal').modal('hide');
                                    table.draw();
                                }
                        });
                    }
            });


				$('#exampleModal').on('show.bs.modal', function (event) {
                    $(".modal-body").html("");
				  var button = $(event.relatedTarget) // Button that triggered the modal
				  var recipient = button.data('whatever') // Extract info from data-* attributes
				  var id = button.data('id')
				  // console.log(recipient);
				  // console.log(id);
				  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    if(recipient=="#"){
                        var modal = $(this)
                          modal.find('.modal-title').text('Student Id ' + id);
                          var grade=button.data('grade');
                          var status=button.data('ststatus');
                          console.log(status);
                          form='';
                          form +='<div class="form-group"><label for="grade">Grade:</label>';
                          form +='<input type="text" class="form-control" name="grade" id="grade" value="'+grade +'"><span style="color:red;font-weight:bold;display:none;" id="nograde">This field is required</span></div>';
                        form +='<div class="checkbox"><label>'
                        if(status==1){
                            form +='<input type="radio" value="1" id="status" name="status" checked>Active ';
                            form +='<input id="status" type="radio" value="0" name="status"> Deactive ';
                        }else{
                            form +='<input type="radio" value="1" id="status" name="status" >Active ';
                            form +='<input id="status" type="radio" value="0" name="status" checked> Deactive ';
                        }
                     
                        form +='</label></div><button type="button" id="save_student" class="btn btn-default">Save</button><input type="hidden" id="id" value="'+id+'">';
                        $(".modal-body").html(form);
                    } else{
        				  var modal = $(this)
        				  modal.find('.modal-title').text('All Scores ' + recipient)
        				  modal.find('.modal-body input').val(recipient)
                          $(".modal-body").html("");

        				  $.ajax({
        					url:"stscores.php?id="+id,
         					success:function(result){
        						$(".modal-body").html(result);
        				   }});
                    }
				});

</script>
@endsection