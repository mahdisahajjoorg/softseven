@extends('master')

@section('title','Add School')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
			<form action="{{route('school.add_school_form_submit')}}" method="post" id="summary-form" class="form-horizontal">			    
            @csrf
            <section class="panel">
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
                        <label class="col-sm-3 control-label">School Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" id="SchoolSchoolName" name="school_name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" id="SchoolCity" name="city" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">State (Only For USA) <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg state" id="SchoolState" name="state" required>
                            <option value="">Select State</opiton>
                            @foreach($state as $s)
                             <option value="{{$s->id}}">{{$s->state_abbr}}</option>
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
                        <select class="form-control input-lg" name="country" required>
                        @foreach($country as $c)
                            
                            @if($c->name=='United States')
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
                        <input type="text" class="form-control input-lg" id="SchoolSchoolCode" name="school_code" required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">School Password <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="password" required>                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grade <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="grade" required>                        
                        </div>
                    </div>



                      <div class="form-group">
                        <label class="col-sm-3 control-label">Enrollment </label>
                        <div class="col-sm-9">
                        <input type="number" class="form-control input-lg" name="enrollment">                                                
                        </div>
                    </div>
              <div class="form-group">
                        <label class="col-sm-3 control-label">Mascot </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="mascot">                                                
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address </label>
                        <div class="col-sm-9">
                        <textarea class="form-control input-lg" cols="30" rows="6" name="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Notes </label>
                        <div class="col-sm-9">
                           <textarea class="form-control input-lg" cols="30" rows="6" name="notes"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Principal</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="principal"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="contact_person"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone </label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="phone"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control input-lg" name="mobile_phone"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Status <span class="required">*</span></label>
                        <div class="col-sm-9">
                         <select class="form-control input-lg" name="payment_status" required>
                            <option value="0">Not Paid</option>
                            <option value="1" selected>Paid</option>
                            <option value="2">Paid Deluxe</option>
                         </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label">Charter Members <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="charter_member" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                         </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <?php 
                             $tODAY=date('Y-m-d');
                            $effectiveDate = date('Y-m-d', strtotime("+0 months", strtotime($tODAY)));
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
                                <?php $current=date("Y");
                                $timestamp1 = strtotime('+20 years');
                                $end=date('Y', $timestamp1);
                                $timestamp2 = strtotime('-20 years');
                                $start=date('Y', $timestamp2);
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
                            $effectiveDate = date('Y-m-d', strtotime("+3 months", strtotime($tODAY)));
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
                                <?php $current=date("Y");
                                $timestamp1 = strtotime('+20 years');
                                $end=date('Y', $timestamp1);
                                $timestamp2 = strtotime('-20 years');
                                $start=date('Y', $timestamp2);
                                ?><?php for ($i = $start; $i <= $end; $i++){?>
                                <option value="<?php echo $i; ?>" <?php if($pieces[0]==$i) echo 'selected';?>><?php echo $i; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">School Email<span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="email" class="form-control input-lg" name="school_email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">FastCode</label>
                        <div class="col-sm-9">
                        <input type="text" name="fastcode" class="form-control input-lg">
                           <?php if(isset($error['fastcode'])){?><span style="color:red;font-weight:bold;"><?php echo $error['fastcode'];?></span><?php } ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rep Name </label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="representative_id" required>
                            <option value="">Select Rep Name</option>
                            @foreach($rep as $r)
                                <option value="{{$r->id}}">{{$r->firstname}}</option>
                            @endforeach
                         </select>
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
@endsection

@section('css_js_down')
<script>
function checkifschoolcode(schoolcode){
     var randd='<?php echo rand();?>';
            jQuery.ajax({
                        type: "post",
                        data:{code:schoolcode,"_token": "{{ csrf_token() }}"},
                        url: "{{route('school.check_schoolcode')}}",
                        success: function (response) {
                            if(response=='Success'){
                                jQuery('#SchoolSchoolCode').val(schoolcode);
                                jQuery('#summary-form').submit();
                            }else{
                               alert(response);
                               var newschoolcode=schoolcode+"-"+randd;
                                checkifschoolcode(newschoolcode);
                            }
                        }
                    });
}
jQuery(document).ready(function(){
   
   jQuery('body').delegate('#submitadd', 'click', function(e){
       e.preventDefault();
       var schoolname=jQuery('#SchoolSchoolName').val();
       var schoolcity=jQuery('#SchoolCity').val();
       var schoolstate=jQuery("#SchoolState option:selected").text();//jQuery('#SchoolState').text();
       if (jQuery('#SchoolCountry').val() == 'US' && jQuery('#SchoolState').val() == '') {
            alert('Please Select Your State');
        }else{
            var schoolcode='';
           
           if(jQuery('#SchoolState').val() != '') schoolcode=schoolname+"-"+schoolcity+","+schoolstate;
           else schoolcode=schoolname+"-"+schoolcity;
           
           alert('Your School Code is '+schoolcode);
           checkifschoolcode(schoolcode);
           
           
           
           
           
        }
       
   });
   
});

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