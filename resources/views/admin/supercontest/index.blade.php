@extends('master')

@section('title','Employees')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Super Contest</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Super Contest</span></li>
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

        <h2 class="panel-title">
           Super Contest
        </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Contest Name</th>
                    <th>Contest Type</th>
                    <th>Contest Problem</th>
                    <th>Contest Timer</th>
                    <th>Contest Date</th>
                    <th>Contest Category</th>
                    <th>ACtion</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($allsuper as $contest){?>
                <tr>
                    <td><?php echo $contest->id ;?></td>
                    <td><?php echo $contest->name_problem ;?></td>
                    <td><?php echo $contest->type;?></td>
                     <td><?php echo $contest->problem_number;?></td>
                     <td><?php echo $contest->timer;?></td>
                    <td><?php echo $contest->date;?></td>
                     <td><?php echo $contest->category;?></td>
                     <td>
                <a href="{{route('supercontest.edit',['id'=>$contest->id])}}" class="btn btn-primary">Edit</a>
                <a href="javascript:;" onclick="deleteSuperContest({{$contest->id}})" class="btn btn-danger">Delete</a>
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
    function deleteSuperContest(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "POST",
            url: "{{route('supercontest_delete')}}",
            data: {"_token": "{{ csrf_token() }}",id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Super Contest Question deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('supercontest.index')}}';                                                  
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