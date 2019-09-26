@extends('master')

@section('title','Schools')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Schools</h2>

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
           Schools
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
                    <th>Charter Member</th>
                   <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach($schools as $school){?>
                <tr>
                    <td><?php echo $school->id;?></td>
                    <td><?php echo $school->school_name;?></td>
                    <td><?php echo $school->school_code;?></td>
                    <td><?php $citystate='';
                    if(isset($school->state) && !empty($school->state)){
                        $citystate=$school->city.' '.$school->state_details->state_abbr;
                    }else $citystate=$school->city;
                    echo $citystate; ?></td>
                    <td><?php echo $school->phone;?></td>
                    <td><?php echo $school->mainpassword;?></td>
                    
                    <td><?php echo $school->school_email;?></td>
                    <td><?php if($school->payment_status==0) echo 'Not paid'; elseif($school->payment_status==1) echo 'Paid'; elseif($school->payment_status==2) echo 'Paid Deluxe';?></td>
                    <td><?php if($school->charter_member==0) echo 'No'; else echo 'Yes';?></td>
                    <td>
                    <a href="{{route('school.edit_school_form',['id'=>$school->id])}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('school.school_memo',['id'=>$school->id])}}" class="btn btn-primary">Memos</a>
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