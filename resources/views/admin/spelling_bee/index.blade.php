@extends('master')

@section('title','Employees')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>SpellingBee Weeks</h2>

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

        @if(Session::get('success'))
       <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
       <div class="row">

       <div class="col-sm-12 text-right">
        <a href="{{ route('spelling_bee.create') }}" class="btn btn-primary">Add Grade</a>

       </div>

      <br>
      <br>
      <br>
       </div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Contest Name</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
            </thead>

 <tbody>

            <?php foreach ($allgrade as $con) {?>
         <tr>
            <td> SpellingBee</td>
            <td><?php echo $con['grade']; ?></td>
            <td>
                <a href="{{route('spelling_bee.edit',['id'=>$con->id])}}" class="btn btn-primary">Edit</a>
                <a href="javascript:;" onclick="deleteSpellingBee({{$con->id}})" class="btn btn-danger">Delete</a> 
            </td>

         </tr>



<?php }?>


</tbody>
</table>
</div>
</section>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteSpellingBee(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    var url = 'spelling_bee/destroy/'+id;
    $.ajax({
            type: "GET",
            url: url,
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Employee deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('employee.index')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The employee is not deleted!");
  }
});
  }
</script>
@endsection