@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')
                
<section class="content-body" style="margin: -5%;" role="main">
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
           <a href="{{route('question.add_all_geo_question')}}" class="btn btn-primary">Add Geo Question</a>                  

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
                       <?php echo $info->georace_contest_name; ?>
                    </td>
                    <td>
                      <a href="{{route('ques_w.edit_geo_ques_wordrace_form',['id'=>$info->id])}}" class="btn btn-primary">Edit</a>
                      <a href="javascript:;" onclick="deleteE_al_geo_ques({{$info->id}})" class="btn btn-danger">Delete</a>

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
    function deleteE_al_geo_ques(id){
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
            url: "{{route('question.del_geo_question')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal(" GeoRace Qustion deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.all_geo_q_view')}}';                                                  
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