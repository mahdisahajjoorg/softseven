@extends('master')

@section('title','Add School')

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

                    <h2 class="panel-title"><?php 
                    $citystate='';
                    if(isset($school->state) && !empty($school->state)){
                        $citystate=','.$school->city.', '.$school->state_details->name;
                    }else $citystate=','.$school->city;
                    echo $school->school_name. $citystate.' Edit'?> </h2>
                    
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
                        <label class="col-sm-3 control-label">School Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="school_name" class="form-control input-lg" value="{{$school->school_name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" name="city" class="form-control input-lg" value="{{$school->city}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">State (Only For USA) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg state" id="SchoolState" name="state">
                            <option value="">Select State</opiton>
                            @foreach($state as $s)
                             @if($s->id==$school->state)
                             <option value="{{$s->id}}" selected>{{$s->state_abbr}}</option>
                             @else
                             <option value="{{$s->id}}">{{$s->state_abbr}}</option>
                             @endif
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">County </label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" id="county" name="county_id">
                            <option value="">Select County</opiton>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Country <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="country">
                        @foreach($country as $c)                            
                            @if($c->id==$school->country_id)
                            <option value="{{$c->id}}" selected>{{$c->name}}</opiton>
                            @else
                            <option value="{{$c->id}}">{{$c->name}}</opiton>
                            @endif
                        @endforeach    
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">School Code <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="{{$school->school_code}}" class="form-control input-lg" name="school_code" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">School Password <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="{{$school->mainpassword}}" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Enrollment</label>
                        <div class="col-sm-9">
                        <input type="number" value="@if($school->enrollment!=null){{$school->enrollment}}@endif" name="enrollment" class="form-control input-lg">
                        </div>
                    </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Grade <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" value="@if($school->grade!=null){{$school->grade}}@endif" name="grade" class="form-control input-lg">
                        </div>
                        </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Mascot </label>
                        <div class="col-sm-9">
                        <input type="text" name="mascot" class="form-control input-lg" value="@if($school->mascot!=null){{$school->mascot}}@endif">
                        </div>
                    </div>  
                    
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address </label>
                        <div class="col-sm-9">
                        <textarea class="form-control input-lg" cols="30" rows="6" name="address">@if($school->address!=null){{$school->address}}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Notes </label>
                        <div class="col-sm-9">
                           <textarea class="form-control input-lg" cols="30" rows="6" name="notes">@if($school->notes!=null){{$school->notes}}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Principal</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="principal" value="@if($school->principal!=null){{$school->principal}}@endif"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="contact_person" value="@if($school->contact_person!=null){{$school->contact_person}}@endif"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="phone" value="@if($school->phone!=null){{$school->phone}}@endif"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="mobile_phone" value="@if($school->fax!=null){{$school->fax}}@endif"> 
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Status <span class="required">*</span></label>
                        <div class="col-sm-9">
                         <select class="form-control input-lg" name="payment_status">
                            @if($school->payment_status==0)
                            <option value="0" selected>Not Paid</option>
                            <option value="1">Paid</option>
                            <option value="2">Paid Deluxe</option>
                            @elseif($school->payment_status==1)
                            <option value="0">Not Paid</option>
                            <option value="1" selected>Paid</option>
                            <option value="2">Paid Deluxe</option>
                            @elseif($school->payment_status==2)
                            <option value="0">Not Paid</option>
                            <option value="1">Paid</option>
                            <option value="2" selected>Paid Deluxe</option>
                            @endif
                         </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Charter Members <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="charter_member">
                            @if($school->charter_member==0)
                            <option value="0" selected>No</option>
                            <option value="1">Yes</option>
                            @elseif($school->charter_member==1)
                            <option value="0">No</option>
                            <option value="1" selected>Yes</option>
                            @endif

                         </select>
                        </div>
                    </div>
                                      <div class="form-group">
                        <label class="col-sm-3 control-label">Start Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <?php 
                             $tODAY=$school->started_date;
                            $effectiveDate = date($school->started_date, strtotime("+0 months", strtotime($tODAY)));
                           $pieces = explode("-", $effectiveDate);
                          
                            //echo $this->Form->input('School.expire_date', array('class' => 'form-control input-lg ', 'label' => false, 'div' => false, 'required','style'=>'display:inline-block;width:auto;')); ?>
                        
                        
                            <select id="SchoolStartedDateMonth" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="start_date_month">
                                <?php foreach($montharray as $k=>$v) {?>
                                <option value="<?php echo $k; ?>" <?php if($pieces[1]==$k) echo 'selected';?>><?php echo $v; ?></option>
                                <?php }?>
                            </select>
                            -
                            <select id="SchoolStartedDateDay" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="start_date_day">
                                <?php for ($i = 1; $i <= 31; $i++){?>
                                <option value="<?php echo $i; ?>" <?php if($pieces[2]==$i) echo 'selected';?>><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                            -
                            <select id="SchoolStartedDateYear" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="start_date_year">
                                <?php
                                $c = explode('-',$school->started_date);
                                $current=date("Y");
                                $timestamp1 = strtotime('+20 years');
                                $end=date('Y', $timestamp1);
                                $timestamp2 = strtotime('-20 years');
                                $start=date($c[0], $timestamp2);
                                ?><?php for ($i = $start; $i <= $end; $i++){?>
                                <option value="<?php echo $i; ?>" <?php if($pieces[0]==$i) echo 'selected';?>><?php echo $i; ?></option>
                                <?php }?>
                             </select>   
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Expire Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                            
                            <?php 
                             $tODAY=date('Y-m-d');
                            $effectiveDate = date($school->expire_date, strtotime("+3 months", strtotime($tODAY)));
                           $pieces = explode("-", $effectiveDate);
                          
                            //echo $this->Form->input('School.expire_date', array('class' => 'form-control input-lg ', 'label' => false, 'div' => false, 'required','style'=>'display:inline-block;width:auto;')); ?>
                        
                        
                            <select id="SchoolExpireDateMonth" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="expire_date_month">
                                <?php foreach($montharray as $k=>$v) {?>
                                <option value="<?php echo $k; ?>" <?php if($pieces[1]==$k) echo 'selected';?>><?php echo $v; ?></option>
                                <?php }?>
                            </select>
                            -
                            <select id="SchoolExpireDateDay" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="expire_date_day">
                                <?php for ($i = 1; $i <= 31; $i++){?>
                                <option value="<?php echo $i; ?>" <?php if($pieces[2]==$i) echo 'selected';?>><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                            -
                            <select id="SchoolExpireDateYear" class="form-control input-lg datepicker" style="display:inline-block;width:auto;" required="required" name="expire_date_year">
                                <?php
                                $c = explode('-',$school->started_date);
                                $current=date("Y");
                                $timestamp1 = strtotime('+20 years');
                                $end=date('Y', $timestamp1);
                                $timestamp2 = strtotime('-20 years');
                                $start=date($c[0], $timestamp2);
                                ?><?php for ($i = $start; $i <= $end; $i++){?>
                                <option value="<?php echo $i; ?>" <?php if($pieces[0]==$i) echo 'selected';?>><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
     
                <div class="form-group">
                        <label class="col-sm-3 control-label">School Email<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="email" class="form-control input-lg" name="school_email" value="{{$school->school_email}}">
                        </div>
                    </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">FastCode</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="fastcode" value="@if($school->fastcode!=null){{$school->fastcode}}@endif">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rep Name </label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="representative_id">
                            <option value="">Select Rep Name</option>
                            @foreach($rep as $r)
                                @if($r->id==$school->representative_id)    
                                <option value="{{$r->id}}" selected>{{$r->firstname}}</option>
                                @else
                                <option value="{{$r->id}}">{{$r->firstname}}</option>
                                @endif        
                            @endforeach
                         </select>
                        </div>
                    </div> 


                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                        <input type="hidden" name="school_id" value="{{$school->id}}">
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
var pre_county ="{{$school->county_id}}";
onload_getCounty();
    function onload_getCounty(){
     var state =$('.state option:selected').val();
        if(state==''){
            var html='<option value="">Select County</option>';
                $('#county').html(html);
        }
         else{
            $.ajax({
             data: {state_id:state,"_token": "{{ csrf_token() }}"},
             type: "post",
             url: "{{route('school.get_county_one')}}",
             success: function(data){ 
               data = JSON.parse(data); 
               var html='<option value="">Select County</option>';
               $.each(data,function(index, value){
               var sel = pre_county==value.id?'selected':'';
                html +='<option value="'+value.id+'" '+sel+'>'+value.county+'</option>';
               })
               $('#county').html(html);
             }
             
            }); 
        }
    }
</script>



<script>
    $(document).on('change','.state',function(){  
        var state =$('.state option:selected').val();
        if(state==''){
        var html='<option value="">Select County</option>';
            $('#county').html(html);
        }
        else{
            $.ajax({
             data: {state_id:state,"_token": "{{ csrf_token() }}"},
             type: "post",
             url: "{{route('school.get_country')}}",
             success: function(data){                       
               data = JSON.parse(data);                                         
               var html='<option value="">Select County</option>';
               $.each(data,function(index, value){
                html +='<option value="'+value.id+'">'+value.county+'</option>';
               })
               $('#county').html(html);


             }
             
            }); 
        }



    });
</script>
@endsection