@extends('master')

@section('title','Approved Students')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Approved Students</h2>

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

        <h2 class="panel-title"><span >Students</span>
            <span style="float:right; padding-right:10%;">
                <?php //echo $this->Html->link('Approve All', array('controller'=>'students', 'action'=>'approve_all'), array('class' => 'btn btn-primary'));?>
                 <?php //echo $this->Html->link('Unapprove All', array('controller'=>'students', 'action'=>'unapprove_all'), array('class' => 'btn btn-primary'));?>
                
            </span>
            <span class="clr"></span></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                 <th>Id</th>
                    <th>Student name</th>
                    <th >Screen Name</th>
                    <th >School Code</th>
                    <th>City, State/Country</th>
                    <th>Reject Student</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
                
                <?php  foreach($approved_students as $st){?>
                <tr>
                <td><?php echo $st->id;?></td>
                    <td><?php echo $st->firstname.' '.$st->lastname;?></td>
                    <td><?php echo $st->screen_name;?></td>
                    <td><?php echo $st->school_code;?></td>
                   
                    <td><?php 
                    $place='';
                  if(isset($st->state) && !empty($st->state)) $place=$st->state;
                     else $place=$st->country;

                   echo $st->city.', '.$place;?></td>
                    <td><?php 
                    
                        if(isset($st->is_approved) && $st->is_approved==1)
                          { ?>
                          <a href="{{route('student.reject_student',['id'=>$st->id])}}">Reject</a>
                          <?php } ?>
                        </td>
                    
                </tr>
                <?php } ?>
                   
                
            </tbody>
        </table>
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
@endsection