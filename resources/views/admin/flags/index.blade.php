@extends('master')

@section('title','Flags')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Flags</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Flags</span></li>
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
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Code</th>
                    <th>Flag</th>
                    
                    <th>Remove</th>
                    
                </tr>
            </thead>
            <tbody>
            @if($school->count()>0)
                <tr>
                    <td>School</td>
                    <td>
                    
                    </td>
                    <td>
                    <a href="javascript:;" onclick="deleteFlag()" class="btn btn-primary delete">Remove</a>
                      
                    </td>
                    
                </tr>
            @endif       
                
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteFlag(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this memo info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "POST",
            url: "{{route('school.delete_memo')}}",
            data: {id:id,"_token": "{{ csrf_token() }}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data.code==1){
                    swal("Memo deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            var u = '{{ route("school.school_memo", ":id" )}}';
                            u = u.replace(':id',data.school_id);
                            window.location.href = u;                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The memo is not deleted!");
  }
});
  }
</script>
@endsection