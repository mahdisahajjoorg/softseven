@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

              
<style>
    .w_level{
    height: 70px;
    width: 70px;
    background-color: #000000;
    position: absolute;
    margin: 0 auto;
    text-align: center;
    left: 28%;
    top: 21%;
}
    
    
    
</style>

<header class="page-header">

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span> Softseven Employee</span></li>
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
    <div class="panel-body">
       <div class="row">
       <div class="col-sm-12 text-right">
       <a href="{{route('question.set_add')}}" class="btn btn-primary">Add New</a>                  
       </div>
      <br>
      <br>
      <br>
    </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-buttons">
            <thead>
                <tr>
                    <th>Game Level</th>
                    <th>Level Color</th>
                    <th>Level Image</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody >
                <?php foreach($data as $info){?>
                <tr>
                    <td><?php echo $info->level_data ;?></td>

                    <td style="position: relative;"> <span class="w_level"  style="background-color:<?php echo $info->color;?>"></span> </td>

                    <td><img height="120px" src="{{ url('assets/img/levels/'.$info->image) }}"></td>

                    <td>
                    <a href="{{route('question.edit_settings_form',['id'=>$info->id])}}" class="btn btn-primary">Edit</a>
                    <a href="javascript:;" onclick="deleteE_w_settings_ques({{$info->id}})" class="btn btn-danger">Delete</a>
                    </td>
                    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('css_js_down')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteE_w_settings_ques(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Wordrace Question info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('question_w.delete_w_s_ques')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal(" Deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('question.ques_settions_form')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The Wordrace Question is not deleted!");
  }
});
  }
</script>

@endsection