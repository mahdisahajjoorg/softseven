@extends('master')

@section('title','Game Levels')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Game Levels</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Game</span></li>
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
                    <th>Game Name</th>
                    <th >Level Number</th>
                    <th >Low</th>
                    <th >High</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($game_levels as $gamelevel) { ?>
                    <tr>
                        <td><?php echo $gamelevel->game->game_name; ?></td>
                        <td><?php echo $gamelevel->level; ?></td>
                        <td ><span class="lowtd"><?php echo $gamelevel->low; ?></span>
                        <input type="text" style="display:none" class="form-control input-md low" value="<?php echo $gamelevel->low;?>" name="low">
                        </td>
                        <td ><span class="hitd"><?php echo $gamelevel->high; ?></span>
                            <input type="text" style="display:none" class="form-control input-md high" value="<?php echo $gamelevel->high;?>" name="high">

                        </td>

                        <td>
                        <a href="javascript:;" class="nr_btn btn btn-primary edit_lowhi" id="<?php echo $gamelevel->id; ?>">Edit Data</a>
                        <a href="javascript:;" onclick="deleteGameLevel({{$gamelevel->id}})" class="btn btn-primary">Delete</a>
                        </td>

                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>
</section>
<script>
jQuery(document).ready(function(){
    //jQuery(".low").hide();
    //jQuery(".high").hide();
    jQuery( "#datatable-default" ).delegate( ".nr_btn", "click", function(e) {
    //jQuery('.btn').click(function(e){
        e.preventDefault();
        
        var th_cls=jQuery(this).attr('class');
        if(th_cls=="nr_btn btn btn-primary edit_lowhi"){
            jQuery(this).parent().parent().find(".lowtd, .hitd").hide();
            jQuery(this).parent().parent().find(".low, .high").show();
            jQuery(this).html('Update');
            jQuery(this).removeClass('edit_lowhi').addClass('edit_main');
        }else if(th_cls=="nr_btn btn btn-primary edit_main"){
            var gamelevelid=jQuery(this).attr('id');
        var low_val=jQuery(this).parent().parent().find('.low').val();
        var hi_val=jQuery(this).parent().parent().find('.high').val();
        
        
        jQuery.ajax({
                url: "{{route('game.edit_game_level')}}",
                data:{id:gamelevelid,low:low_val,high:hi_val,"_token": "{{ csrf_token() }}"},
                type: "post",
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
    function deleteGameLevel(id){
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this game level info!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
            type: "POST",
            url: "{{route('game.delete_game_level')}}",
            data: {id:id,"_token": "{{ csrf_token() }}"},
            dataType: "json",
            cache: false,
            success:
            function (data) {
                if(data==1){
                    swal("Game level deleted successfully!", {
                        icon: "success",
                        }).then(function(){
                            window.location.href = "{{route('game.index')}}";                                                  
                        });
                }
            }
                });
    
  } else {
    swal("The game level is not deleted!");
  }
});
  }
</script>
@endsection