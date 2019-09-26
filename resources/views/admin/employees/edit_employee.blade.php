@extends('master')

@section('title','Edit Employee')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
				<form id="summary-form" class="form-horizontal"  method="post" action="{{route('employee.edit_employee_form_submit')}}">		    
                @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Softseven Employee Edit</h2>
                    
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
                        <label class="col-sm-3 control-label">First Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="{{$employee->firstname}}" class="form-control input-lg" name="firstname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="{{$employee->lastname}}" class="form-control input-lg" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="{{$employee->main_password}}" class="form-control input-lg" name="password" required>
                        </div>
                    </div>
                    <input type="hidden" value="{{$employee->id}}" name="employee_id">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                        <input type="email" value="{{$employee->email}}" class="form-control input-lg" name="email">
                        </div>
                    </div>
                    
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary">Submit</button>
                            <!-- <button type="reset" class="btn btn-default">Reset</button> -->
                        </div>
                    </div>
                </footer>
            </section>
      </form>
    </div>
</div>
<script>

jQuery(document).ready(function(){
    //jQuery('.datepicker').datepicker();
});

</script>
@endsection

@section('css_js_down')
@endsection