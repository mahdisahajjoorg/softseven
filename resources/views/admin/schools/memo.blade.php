@extends('master')

@section('title','School Memo')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Memos</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Memo</span></li>
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

        <h2 class="panel-title">
           Memos
        </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>School Name</th>
                    <th >Memo</th>
                    
                    <th>Date</th>
                   <th>ACtion</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php if($school_memos->count()>0){ ?>
                <?php foreach($school_memos as $memo){?>
                <tr>
                    <td><?php echo $memo->id ;?></td>
                    <td><?php echo $memo->school->school_name ;?></td>
                    <td><?php echo $memo->memo;?></td>
                    
                    <td><?php echo $memo->date;?></td>
                    <td>
                    <a href="{{route('school.edit_memo_form',['id'=>$memo->id])}}" class="btn btn-primary">Edit</a>
                    <a href="javascript:;" onclick="deleteMemo({{$memo->id}})" class="btn btn-primary">Delete</a>
                      
                    </td>
                    
                </tr>
                <?php } ?>
                <?php } ?>
                   
                
            </tbody>
        </table>
    </div>
</section>



@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteMemo(id){
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