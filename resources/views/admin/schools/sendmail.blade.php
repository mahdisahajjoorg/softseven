@extends('master')

@section('title','Employees')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
            
    <form action="{{ route('school.send_mail') }}" method="GET">
        @csrf
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">School Email Send</h2>
            </header>
<div class="panel-body">
            @if(Session::get('success'))
       <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
                <div class="validation-message">
                    <ul></ul>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Select School</label>
                    <div class="col-md-6">

                         <select name="school[]" class="form-control input-lg  populate select2-offscreen" required="required" multiple="multiple" data-plugin-selecttwo="data-plugin-selectTwo" id="SchoolSchoolId" tabindex="-1">
                            @foreach($allSchool as $school)
                             <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                             @endforeach
                          </select>                        
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Subject <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <textarea name="subject" class="form-control input-lg" required="required" cols="30" rows="6" id="SchoolSubject"></textarea>                        </div>
                    </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Mail Body <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <textarea name="mail_body" class="form-control input-lg" required="required" cols="30" rows="6" id="SchoolBody"></textarea>                        </div>
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
<script>
    jQuery(document).ready(function ($) {
        jQuery("#zipdiv").hide();
        showzip();
        function showzip() {
            var schoolcd = jQuery("StudentSchoolCode").val();
            //alert(schoolcd);
            if (schoolcd == "undefined" || schoolcd == '') {
                //alert('show zip');
                jQuery("#zipdiv").show();
                //jQuery("#schooldiv").hide();

            } else {
                jQuery("#zipdiv").hide();
                // jQuery("#schooldiv").show();
            }
        }
        jQuery("#StudentSchoolCode").change(function (e) {
            e.preventDefault();
            showzip();
        });

    });
</script>
@endsection