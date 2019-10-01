@extends('master')

@section('title','Approved Students')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Students</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>School</span></li>
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

        <h2 class="panel-title"><span >Students Firstname List</span>
            <span style="float:right; padding-right:10%;">

                
            </span>
            <span class="clr"></span></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="approve_student">
            <thead>
                <tr>
                 <th>Id</th>
                    <th>Firstname</th>
                    <th >Status</th>
                    <th >Action</th>
                </tr>
            </thead>

        </table>
         <button class="btn btn-primary pr_submit"> Submit</button>
    </div>
</section>
<script>
jQuery(document).ready(function(){ 
    jQuery('body').delegate('.delete','click',function(){
          
                    var $thisLayoutBtn = jQuery(this);
                    var $href = jQuery(this).attr('href');
                    var makeChange = true;

                    
                    if(makeChange){
                        swal({
                            title: "Are you sure?",
                            text: "This data will be deleted",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: true
                          },
                          function(isConfirm){
                              if (isConfirm) {
                                   window.location.href = $href;
                              } else {
                                  
                              }
                        });
                    }
                    
                    return false;
                });
});
</script>
     
@endsection

@section('css_js_down')
<script type="text/javascript">
    var oTable;

    $(document).ready(function() {
        oTable = $('#approve_student').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": "{!!route('firstname_list_data')!!}",
            "columns": [
                {data: 'id',  name: 'id'},
                {data: 'firstname',  name: 'firstname'},
                {data: 'is_approved',  name: 'is_approved'},
                {data: 'action',  name: 'action'},
            ]
        });
    });



$('.pr_submit').on('click',function(){
var mainArray=[];
$("input[type=radio]:checked").each(function() {
        var obj={};
        var value = $(this).val();
        var name = $(this).attr('name');
        obj[name] = value;
        mainArray.push(obj);
});

$.ajax({
            type: "POST",
            url: '{{ route('change_student_status') }}',
            data: {"_token": "{{ csrf_token() }}",'data':mainArray},
            dataType: "html",
            success: function (response) {
                if(response == 'done'){
                    location.reload();
                }
            },
            error: function (request) {
            }
        });

})

</script>
@endsection