@extends('master_webpg')

@section('title','Contact Softseven')

@section('css_js_up')

@endsection

@section('nav')
<nav  class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand imgband" href="index.php"><img src="SSLogo866.png" style="height:50px;width:200px;"/></a>  -->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav menu">
                    <li>
                        <a href="{{ route('total_schools.index') }}">Student List</a>
                    </li>
                    <li>
                        <a href="{{ route('top_schools.index') }}">Top Schools</a>
                    </li>
                    <!--<li>
                        <a href="highsore.php">High Scores</a>
                    </li>-->
                    <!--<li>
                        <a href="jumpbadge.php">Jump Badges</a>
                    </li>-->
                    <li>
                        
                        <a href="{{ route('grandtotal_per_students.index') }}">Grand Totals</a>
                        <!--<a href="grandtotal.php">Grand Total</a>-->
                    </li>
                    <li>
                        <a href="{{route('outer_super.index')}}">Super Contest</a>
                    </li>
					 <li>
                        <a href="{{ route('mobilescores.index') }}">Mobile Scores</a>
                    </li>
                    <li>
                        <a href="{{route('contact.contact_softseven_form')}}" class="active">Contact SoftSeven</a>
                    </li>
					<li>
                        <a href="http://softseven.com">Home Page</a>
                    </li>
                    <li>
                        <a href="{{route('extenstion_list')}}">Extension Page</a>
                    </li>
                    <li>
                        <a href="{{route('schoolchampions_list')}}">School Champions</a>
                    </li>
					<li>
                        <a href="{{route('todayschampions_list')}}">Today School Champions</a>
                    </li>
                    <li>
                        <a href="{{route('softsevenchampions_list')}}">SoftSeven Champions</a>
                    </li>
                    <li>
                        <!--<a href="softsevenchampionslevel.php">SoftSeven Champions by Level</a>-->
                         <a href="{{route('goldstar_list')}}">Gold Star</a>
                    </li>
   <!--                  <li>
//                        <a href="awardpage.php">Award Page</a>
//                    </li>
 -->
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <style>
    .menu li a{
        color: yellow !important;
        font-size: 18px;
    }
    .imgband{
        padding: 2px 15px !important;
    }
	.active{
		border-bottom: 2px solid yellow;
		padding-bottom:2px !important;
	}
</style>
<script>
$(document).ready(function () {
$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("nav ul a").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
});
});
</script>

@endsection

@section('main_content')
<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="SchoolContactForm" action="{{route('contact.contact_softseven_form_submit')}}" method="post" class="form-horizontal">      
                       @csrf
                        <section class="panel">
                        @if(Session::get('success_message'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('success_message') }}
                            </div>
                            @endif
                            <header class="panel-heading">
                            
                                <div class="panel-actions">
                                    <a href="#" class="fa fa-caret-down"></a>
                                    <a href="#" class="fa fa-times"></a>
                                </div>
                               
                                <h2 class="panel-title">School Add</h2>

                            </header>
                            <div class="panel-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif 
                                <div class="validation-message">
                                    <ul></ul>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Please Contact Us For <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <label class="checkbox-inline"><input  name="more_info" type="checkbox" value="More Info">More Info</label>
                                        <label class="checkbox-inline"><input  name="proposal" type="checkbox" value="Proposal To Purchase">Proposal To Purchase</label>
                                        <label class="checkbox-inline"><input  name="schedule" type="checkbox" value="Schedule a Contest">Schedule a Contest</label>
                                        <label class="checkbox-inline"><input  name="refer" type="checkbox" value="Refer a School for a Commission">Refer a School for a Commission</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contact Person<span class="required">*</span> </label>
                                    <div class="col-sm-9">
                                        <input id="SchoolContactPerson" class="form-control input-lg" type="text" maxlength="255"  name="contact_person">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contact Cell Phone <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="SchoolContactlPhone" class="form-control input-lg" type="text" maxlength="255" name="contact_person_phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">School Name <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="SchoolName" class="form-control input-lg" type="text" maxlength="255" name="school_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">City <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="SchoolCity" class="form-control input-lg" type="text" maxlength="255"  name="city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State (Only For USA) <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="SchoolCountry" name="state">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                             <option value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Country <span class="required">*</span></label>
                                    <div class="col-sm-9">

                                        <select class="form-control" id="SchoolOption" name="country">

                                           @foreach($countries as $con)
                                            <option value="{{$con->id}}">{{$con->name}}</option>
                                           @endforeach()

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address </label>
                                    <div class="col-sm-9">
                                        <input id="SchoolAddress" class="form-control input-lg" type="text" maxlength="255" name="address">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Principal</label>
                                    <div class="col-sm-9">
                                        <input id="SchoolPrincipal" class="form-control input-lg" type="text" maxlength="255" name="principal">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">School Phone<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="SchoolPhone" class="form-control input-lg" type="text" maxlength="55"  name="school_phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">School Email<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="SchoolSchoolEmail" class="form-control input-lg" type="text" maxlength="255"  name="school_email">
                                    </div>
                                </div>

                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button class="btn btn-primary" id="submitadd">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </footer>
                        </section>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('css_js_down')

@endsection