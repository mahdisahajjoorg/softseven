@extends('master')

@section('title','Student Mail')

@section('css_js_up')
@endsection

@section('main_content')

<div class="row">
    <div class="col-md-12">
    <form method="post" action="{{route('school.edit_school_form_submit')}}" id="summary-form" class="form-horizontal">
			@csrf

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Student Mail</h2>
            </header>
            <div class="panel-body">
                <div class="validation-message">
                    <ul></ul>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Select Student</label>
                    <div class="col-md-6">
                    <select name="student[]" class="form-control input-lg  populate select2-offscreen" required="required" multiple="multiple" data-plugin-selecttwo="data-plugin-selectTwo" id="SchoolSchoolId" tabindex="-1">
                        @foreach($students as $s)
                        <option value="{{$s->id}}">{{$s->firstname}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Subject <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <textarea class="form-control input-lg" name="subject"></textarea>
                        </div>
                    </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Mail Body <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <textarea class="form-control input-lg" name="body"></textarea>
                        </div>
                    </div>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary" type="submit" id="studentedt">Submit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
            </footer>
        </section>
        </form>
    </div>
</div>
     
@endsection

@section('css_js_down')

@endsection