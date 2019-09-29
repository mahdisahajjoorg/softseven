@extends('master')

@section('title','Unapproved Students')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Unapproved Students</h2>

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
            <a href="{{route('student.approve_all')}}" class="btn btn-primary">Approve All</a>
                
            </span>
            <span class="clr"></span></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                 
                    <th>Student name</th>
                    <th >Screen Name</th>
                    <th >School Code</th>
                    <th>City, State/Country</th>
                    <th>Approve Student</th>
                    <th>Change</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                
                <?php  foreach($unapproved_students as $st){?>
                <tr><td><?php echo $st->firstname.' '.$st->lastname;?></td>
                    <td><?php echo $st->screen_name;?></td>
                    <td><?php echo $st->school_code;?></td>
                   
                    <td><?php 
                    $place='';
                  if(isset($st->state) && !empty($st->state)) $place=$st->state;
                     else $place=$st->country;

                   echo $st->city.', '.$place;?></td>
                    <td><?php 
                    
                    //if($schooladmin['School']['payment_status']==1 || $schooladmin['School']['payment_status']==2){
                        if(isset($st->is_approved) && $st->is_approved==0)
                                 { ?> 
                                 <a href="{{route('student.approve',$st->id)}}">Approve</a>
                                <?php  }
                        if(isset($st->is_approved) && $st->is_approved==1)
                          { 
                            echo "<a href=''>Accepted</a>";                               
                          }
                    
                    
                    

?></td>
                    <td>
                   <a href="{{route('student.change_to_nonstudent',['id'=>$st->id])}}">Change to Nonstudent</a>
                    </td>
                    
                </tr>
                <?php } ?>
                   
                
            </tbody>
        </table>
    </div>
</section>
@endsection

@section('css_js_down')
@endsection