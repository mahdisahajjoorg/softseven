@extends('master')

@section('title','Certificates')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Certificates</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            
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
            Certificates
        </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>
                        <span>
                            Title
                        </span>
                    </th>
                    <th>
                    <span>
                        Certificate
                    </span>
                    </th>
                    <th><span>Action</span></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($certificates as $score) { ?>
                    <tr>
                        <td>
                            
                            <?php echo $score->title; ?></td>
                        <td>
                            <img src="{{url('')}}/assets/upload/certificates/{{$score->image_file_name}}" height="180" width="180"/>
                        </td>
                        
                        <td>
                        <a href="{{route('certificate.edit_certificate_form',['id'=>$score->id])}}" class="btn btn-default">Edit</a>
                        <a href="javascript:;" onclick="deleteCertificate({{$score->id}})" class="btn btn-default">Delete</a>
                        </td>


                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </div>
</section>
<script type="text/javascript">
</script>
@endsection

@section('css_js_down')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deleteCertificate(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this certificate info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "post",
            url: "{{route('certificate.delete_certificate')}}",
            data: {id:id,"_token":"{{csrf_token()}}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Certificate deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('certificate.index')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The certificate is not deleted!");
  }
});
  }
</script>
@endsection