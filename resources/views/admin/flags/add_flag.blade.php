@extends('master')

@section('title','Add Flag')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
<form method="post" action="{{route('flag.add_flag_form_submit')}}" id="summary-form" class="form-horizontal" enctype="multipart/form-data">
			@csrf			    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Flag Add</h2>
                    
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
                        <label class="col-sm-3 control-label">Select Type <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control input-lg" name="type" id="selectType">
                              <option value="School" selected>School</option>
                              <option value="Country">Country</option>
                              <option value="State">State</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body country">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group countrydiv">
                        <label class="col-sm-3 control-label">Select Country <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select name="country" class="form-control input-lg country">
                            @foreach($countries as $s)
                            @if($s->name=="United States")
                            <option value="{{$s->id}}" selected>{{$s->name}}</option>
                            @else
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endif
                            @endforeach
                          </select> 
                
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body state">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Select State <span class="required">*</span></label>
                        <div class="col-sm-9">
                          <select name="state" class="form-control input-lg state">
                            @foreach($states as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                          </select> 
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body school">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-3 control-label">Select School <span class="required">*</span></label>
                        <div class="col-sm-9">
                          <select name="school_id" class="form-control input-lg school">
                            @foreach($schools as $s)
                            <option value="{{$s->id}}">{{$s->school_code}}</option>
                            @endforeach
                          </select>  
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body flag">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Flag <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control flag" name="flag" style="padding:0px 0px;">
                        </div>
                    </div>
                    
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
     </form>
    </div>
</div>
<script>
jQuery(document).ready(function(){
    showhidedivs();
   
    jQuery("#selectType").change(function(e){
        e.preventDefault();
        showhidedivs();
        
    });
    function showhidedivs(){
        var selectType=jQuery("#selectType").val();
       
        if(selectType=='School'){
            jQuery(".country, .state").hide();
            jQuery(".school, .flag").show();
         }else if(selectType=='Country'){
            jQuery(".school, .state").hide();
            jQuery(".country, .flag").show();
         }else if(selectType=='State'){
            jQuery(".school, .country").hide();
            jQuery(".state, .flag").show();
         }
    }
    
});
</script>
@endsection

@section('css_js_down')
@endsection