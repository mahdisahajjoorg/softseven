@extends('master')

@section('title','Block Words')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Block Words</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Block Word</span></li>
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
                    <th>Block Words</th>
                    
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                
                <?php foreach($block_words as $bw){?>
                <tr>
                    <td>
                    <span class='word_span'>
                    <?php echo $bw->words;?>
                    </span>
                    <input type="text" class="form-control input-md word" value="{{$bw->words}}" name="word" style="width:50%;">
                    </td>                    
                    <td>
                    <a href="javascript:;" id="{{$bw->id}}" class="btn btn-primary edit_word nr_btn">Edit Word</a>
                    <a href="javascript:;" onclick="deleteWord({{$bw->id}})"  class="btn btn-primary">Delete</a>
                    </td>
                    
                </tr>
                <?php } ?>
                   
                
            </tbody>
        </table>
    </div>
</section>
<script>
jQuery(document).ready(function(){
    jQuery(".word").hide();
    jQuery( "#datatable-default" ).delegate( ".nr_btn", "click", function(e) {
    
    
        e.preventDefault();
       
        var th_cls=jQuery(this).attr('class');

        if(th_cls=="btn btn-primary edit_word nr_btn"){
            jQuery(this).parent().parent().find(".word_span").hide();
            jQuery(this).parent().parent().find(".word").show();
            jQuery(this).html('Update');
            jQuery(this).removeClass('edit_word').addClass('edit_main');
        }else if(th_cls=="btn btn-primary nr_btn edit_main"){
            var wordid=jQuery(this).attr('id');
            var word=jQuery(this).parent().parent().find('.word').val();
        
        jQuery.ajax({
                url: "{{route('blockwords.update_block_words')}}",
                type: "post",
                data: {id:wordid,word:word,"_token":"{{csrf_token()}}"},
                success:function(response){
                    if(response=='success'){
                             location.reload();
                    }
                }
            });
            
        }
        
        
        
    });
   
});
</script>
     
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
            url: "{{route('blockwords.delete_block_words')}}",
            data: {id:id,"_token":"{{csrf_token()}}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Word deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = '{{route('blockwords.index')}}';                                                  
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