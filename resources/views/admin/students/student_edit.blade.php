@extends('master')

@section('title','All Students')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">

      <form method="POST" action="{{ route('students.update', $student->id) }}">
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Student Edit</h2>
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
                @if(Session::get('error_message'))
                <div class="alert alert-danger">
                    <ul>
                      <li>{{Session::get('error_message')}}</li>
                    </ul>
                </div>
                @endif  
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control input-lg" name="firstname" value="{{ $student->firstname }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Last Name<span class="required">*</span></label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control input-lg" name="lastname" value="{{ $student->lastname }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Screen Name <span class="required">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control input-lg" name="screen_name" value="{{ $student->screen_name }}">
                        </div>
                        <div class="col-sm-1">
                          OR
                        </div>
                        <div class="col-sm-4">
                           <input type="text" class="form-control input-lg" name="screen_name2" value="{{ $student->screen_name2 }}">
                        </div>
                    </div>
                     <div class="form-group" id="schooldiv">
                        <label class="col-sm-3 control-label">school code <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control input-lg" name="school_code" value="{{ $student->school_code }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Zip</label>
                        <div class="col-sm-9">
                           <input type="text" class="form-control input-lg" name="zip" value="{{ $student->zip }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control input-lg" name="city" value="{{ $student->city }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">State <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select type="text" class="form-control input-lg" name="state">
                            <option value="">Select a State</option>
                            @foreach ($states as $state)
                            
                            <option value="{{ $state->state_abbr }}" {{ $student->state==$state->state_abbr?'selected':'' }}>{{ $state->name }}</option>
                              @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Can Play Unlimited <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select  class="form-control input-lg" name="can_play_unlimited">
                            <option value="0">No</option>
                            <option value="{{ $student->can_play_unlimited }}" {{ $student->can_play_unlimited != 0?'selected':'' }}>Yes</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Country <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select type="text" class="form-control input-lg" name="country">
                            <option value="">Select a Country</option>
                            @foreach ($countries as $country)
                            
                            <option value="{{ $country->id }}" {{ $student->country==$country->id?'selected':'' }}>{{ $country->name }}</option>
                              @endforeach
                        </select>
                        </div>
                    </div>
                   
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
     function showzip(){
         var schoolcd=jQuery("StudentSchoolCode").val();
         //alert(schoolcd);
         if(schoolcd== "undefined" || schoolcd==''){
             //alert('show zip');
             jQuery("#zipdiv").show();
             //jQuery("#schooldiv").hide();
             
         }else{
             jQuery("#zipdiv").hide();
             // jQuery("#schooldiv").show();
         }
     }
      jQuery("#StudentSchoolCode").change(function (e) {
            e.preventDefault();
            showzip();
        });
     jQuery("#studentedt").click(function (e) {
            e.preventDefault();
            var thisid='';
             var baseurl = "";
             var screenname=jQuery("#StudentScreenName").val();
              var gourl = baseurl + "students/chkscreenname/" + screenname+"/"+thisid;
              $.ajax({
                url: gourl,
                success: function (result) {
                    if(result=='Success'){
                        jQuery("#summary-form").submit();
                    }else{
                        alert(result);
                        jQuery("#StudentScreenName").focus();
                    }
                },
            });

        });
 });
</script>

@endsection