@extends('master')

@section('title','Employees')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Softseven Employee</h2>

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
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Softseven Employee</h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th >Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($employees as $employees){?>
                <tr>
                    <td><?php echo $employees->id ;?></td>
                    <td><?php echo $employees->firstname ;?></td>
                    <td><?php echo $employees->lastname ;?></td>
                    <td><?php echo $employees->email ;?></td>
                    <td>
                    <a href="{{route('employee.edit_employee_form',['id'=>$employees->id])}}" class="btn btn-primary">Edit</a>
                    <a href="javascript:;" onclick="deleteEmployee({{$employees->id}})" class="btn btn-danger">Delete</a> 
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
    function deleteEmployee(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this employee info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('employee.delete_employee')}}",
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