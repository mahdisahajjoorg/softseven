@extends('master')

@section('title','Words')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Words</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Block WOrd</span></li>
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

        
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Words</th>
                    <th>Type</th>
                    
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($words as $bw){?>
                <tr>
                    <td>
                    <span class='word_span'><?php echo $bw->word;?>
                    </span>                    </td>
                    <td><span class='word_span'><?php echo $bw->type;?></span>                    </td>
                    
                    
                    <td>
                    <a href="javascript:;" onclick="deleteWord({{$bw->id}})" class="btn btn-primary">Delete</a>
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
    function deleteWord(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this word info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "post",
            url: "{{route('blockwords.delete_words')}}",
            data: {id:id,"_token":"{{csrf_token()}}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Word deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('blockwords.words')}}';                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The word is not deleted!");
  }
});
  }
</script>
@endsection