@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<style type="text/css">
	.page-header {
    background: #171717;
    border-bottom: none;
    border-left: 1px solid #3a3a3a;
    box-shadow: 1px 3px 0 1px #cccccc;
    height: 50px;
    margin: -41px -39px 54px -41px;
    padding: 0;
}
</style>
             
<section class="content-body" style="margin: -4%;" role="main">
	<header class="page-header">
	    <h2>Questions</h2>

	    <div class="right-wrapper pull-right">
	        <ol class="breadcrumbs">
	            <li>
	                <a href="index.html">
	                    <i class="fa fa-home"></i>
	                </a>
	            </li>
	            <li><span>Questions</span></li>
	            <li><span>Index</span></li>
	        </ol>

	        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	    </div>
	</header>

<section class="panel">
    @if(Session::get('success_message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success_message')}}
        </div>
    @endif
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        
    </header>
    <div class="panel-body">
        <div class="row">
           <div class="col-sm-12 text-right">
           <a href="{{route('question.add_time_question_two')}}" class="btn btn-primary">Add Time Question</a>                  
           </div>
          <br>
          <br>
          <br>
                <table class="table table-bordered table-striped mb-none" id="datatable-buttons">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Answer</th>
                    <th>Hint</th>
                    <th>Contest Name</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $info){?>
                <tr>
                    <td>
                        <img src="{{ url('assets/img/questionimage/thumb/'.$info->Image) }}"  class="img-responsive" alt="" />
                    </td>
                    <td>
                        <?php echo $info->answer1; ?>
                    </td>
                    <td><?php echo $info->hint; ?></td>
                    <td>
                       <?php echo $info->time_contest_id; ?>
                    </td>
                    <td>
                      <a href="{{route('ques_w.edit_time_ques',['id'=>$info->id])}}" class="btn btn-primary">Edit</a>
                      <a href="javascript:;" onclick="deleteE_al_time_questwo({{$info->id}})" class="btn btn-danger">Delete</a>

                    </td>
                </tr>
                <?php } ?>         
                                   
                
            </tbody>
        </table>
            </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: true,
            lengthMenu: [10,25,50,100],          
        });       
    } );

</script>

@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteE_al_time_questwo(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this GeoRace Question info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('ques_w.edit_time_quesdel_time_ques')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal(" GeoRace Qustion deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.all_time_question_two')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The GeoRace Qustion is not deleted!");
  }
});
  }
</script>

@endsection