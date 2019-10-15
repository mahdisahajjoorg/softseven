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
        <table class="table table-bordered table-striped mb-none" id="approve_student">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Payment Status</th>
                    <th>Payment Date</th>
                    <th>Expire Date</th>
                    <th>Action</th>
                    
                    
                    
                </tr>
            </thead>

        </table>
    </div>
</section>
@endsection

@section('css_js_down')

<script type="text/javascript">
    var oTable;

    $(document).ready(function() {
        oTable = $('#approve_student').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{!!route('nonstudent_payments_list')!!}",
            "columns": [
                {data: 'student_id',  name: 'student_id'},
                {data: 'payment_status',  name: 'payment_status'},
                {data: 'payment_date',  name: 'payment_date'},
                {data: 'expire_date',  name: 'expire_date'},
                {data: 'action',  name: 'action', sortable:false, searchable:false},
            ]
        });
    });
</script>



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
    $.ajax({
            type: "GET",
            url: "",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Grade deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '';                                                  
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