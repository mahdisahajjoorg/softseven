@extends('master')

@section('title','Expired School')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Expired Schools</h2>

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

        <h2 class="panel-title">
           Schools Expired
        </h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>School Name</th>
                    <th >School Code</th>
                    <th >City, State</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Payment Status</th>
                    <th>Expired Date</th>
                    <th>Charter Member</th>
                    <th>Score</th>
                   <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                 <?php foreach($school_scores as $school){?>
                <tr>
                    <td><?php echo $school['school']->id;?></td>
                    <td><?php echo $school['school']->school_name ;?></td>
                    <td><?php echo $school['school']->school_code;?></td>
                    <td><?php $citystate='';
                    if(isset($school['school']->state) && !empty($school['school']->state)){
                        $citystate=$school['school']->city.' '.$school['school']->state_details->state_abbr;
                    }else $citystate=$school['school']->city;
                    echo $citystate; ?></td>
                    <td><?php echo $school['school']->phone;?></td>
                    <td><?php echo $school['school']->mainpassword;?></td>
                    
                    <td><?php echo $school['school']->school_email;?></td>
                    <td><?php 
                        if($school['school']->payment_status==0){
                           echo "Not Paid";     
                        }
                        elseif($school['school']->payment_status==1){
                            echo "Paid";
                        }
                    ?></td>
 <!--                    <td><?php     //echo $school[0];?></td>-->
                    <td><?php echo $school['school']->expire_date;?></td>
                    <td><?php
                        if($school['school']->charter_member==0){
                            echo "No";     
                         }
                         elseif($school['school']->charter_member==1){
                             echo "Yes";
                         }
                     
                     ?></td>
                    <td>
                    <?php echo $school['score']; ?>
                    </td>
                   
                    <td>
                    <?php $school_id = $school['school']->id;?>
                    <a href="{{route('school.edit_expire_month',['id'=>$school_id,'month'=>3])}}" class="btn btn-primary" style="margin-bottom:3px;">3 Month Payment</a>
                    <a href="{{route('school.edit_expire_month',['id'=>$school_id,'month'=>12])}}" class="btn btn-primary" style="margin-top:3px;">12 Month Payment</a>
                    </td>
                   
                    
                </tr>
                <?php } ?>
                   
                
            </tbody>
        </table>
    </div>
</section>
<script>

jQuery(document).ready(function(){
    //jQuery('.datepicker').datepicker();
});

</script>


@endsection

@section('css_js_down')
@endsection