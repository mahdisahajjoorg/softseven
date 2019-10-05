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
        @if(Session::get('success_message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success_message')}}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>
    </header>
    <div class="panel-body">
           <a href="{{route('question.add_time_level_tt')}}" class="btn btn-primary">Add Time Level</a>                  
   
          <br>
          <br>
          <br>
                <table class="table table-bordered table-striped mb-none" id="datatable-buttons">
            <thead>
                <tr>
                    <th>Contest Name</th>
                    <th>Category Name</th>
                    <th>Numbers of problem</th>
                    <th>Time</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $info){?>
                <tr>
                    <td>
                        <?php echo $info->time_contest_name	; ?>
                    </td>
                    <td><?php echo $info->time_cat_name; ?></td>
                    <td>
                       <?php echo $info->total_number_problem; ?>
                    </td>
                    <td><?php echo $info->contest_time ; ?></td>
                    <td>
                      <a href="{{route('question.all_time_edit_question',['id'=>$info->id])}}" class="btn btn-primary">Edit</a>
                      <a href="javascript:;" onclick="deleteE_time_level_ques({{$info->id}})" class="btn btn-danger">Delete</a>
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
    function deleteE_time_level_ques(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Time Level Question info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('question.del_time_level')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Time Level Qustion deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.all_time_question')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The Qustion is not deleted!");
  }
});
  }
</script>

@endsection