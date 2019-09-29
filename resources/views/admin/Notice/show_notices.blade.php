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
                    <th>Message</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($data as $info)
                <tr>
                    <td>
                    	<span class='word_span'><?php echo $info->message; ?></span>
                     </td>
                    <td> 
                      <a href="javascript:;" onclick="deleteE_notice_ques({{$info->id}})" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteE_notice_ques(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Notice info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "GET",
            url: "{{route('ques_w.notice_del')}}",
            data: {id:id},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Noticed deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('ques_w.show_notice')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The Notice is not deleted!");
  }
});
  }
</script>

@endsection

@section('css_js_down')

@endsection