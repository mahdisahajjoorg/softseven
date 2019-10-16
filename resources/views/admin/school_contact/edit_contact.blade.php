@extends('master')

@section('title','Edit School Contact')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
    <form action="{{route('school_contact.school_contact_edit_form_submit')}}" method="post" class="form-horizontal" id="summary-form">			    
    @csrf
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title"><?php
                    $citystate = '';
                    if (isset($school_contact->state) && !empty($school_contact->state)) {
                        $citystate = ',' . $school_contact->city . ', ' . $school_contact->sta->state_abbr;
                    } else
                        $citystate = ',' . $school_contact->city;
                    echo $school_contact->school_name . $citystate . ' Edit'
                    ?> </h2>

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
                        <input type="text" name="school_name" value="{{$school_contact->school_name}}" class="form-control input-lg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">City <span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="city" value="{{$school_contact->city}}" class="form-control input-lg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">State (Only For USA) <span class="required">*</span></label>
                    <div class="col-sm-9">
                    <select class="form-control input-lg" name="state" id="SchoolContactsState">
                        @foreach($states as $s)
                         @if($school_contact->sta->id==$s->id)   
                         <option value="{{$s->id}}" selected>{{$s->name}}</option>
                         @else
                         <option value="{{$s->id}}">{{$s->name}}</option>
                         @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Country <span class="required">*</span></label>
                    <div class="col-sm-9">
                    <select class="form-control input-lg" name="country" id="SchoolContactsCountryId">
                    @foreach($countries as $c)
                    @if($school_contact->cry->id==$c->id)
                         <option value="{{$c->id}}" selected>{{$c->name}}</option>
                    @else
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endif
                    @endforeach
                    </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" name="address" value="{{$school_contact->address}}" class="form-control input-lg">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Principal</label>
                    <div class="col-sm-9">
                        <input type="text" name="principal" value="{{$school_contact->principal}}" class="form-control input-lg">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Person </label>
                    <div class="col-sm-9">
                        <input type="text" name="contact_person" value="{{$school_contact->contact_person}}" class="form-control input-lg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contact Person Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="contact_person_phone" value="{{$school_contact->contact_person_phone}}" class="form-control input-lg">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">School Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="school_phone" value="{{$school_contact->school_phone}}" class="form-control input-lg">
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">School Email<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="school_email" value="{{$school_contact->school_email}}" class="form-control input-lg">
                    </div>
                </div>
                @php 
                 $options = json_decode($school_contact->options);
                @endphp
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Options<span class="required">*</span></label>
                    <div class="col-sm-9">
                    <div class="form-control input-lg"><input type="checkbox" name="more_info" @if(isset($options[0])) checked="checked" @endif value="More Info" id="SchoolContactsOptionsMoreInfo" /><label for="SchoolContactsOptionsMoreInfo">More Info</label></div>
                <div class="form-control input-lg"><input type="checkbox" name="proposal" @if(isset($options[1])) checked="checked" @endif  value="Proposal To Purchase" id="SchoolContactsOptionsProposalToPurchase" /><label for="SchoolContactsOptionsProposalToPurchase" class="selected">Proposal To Purchase</label></div>
                <div class="form-control input-lg"><input type="checkbox" name="schedule" @if(isset($options[2])) checked="checked" @endif value="Schedule a Contest" id="SchoolContactsOptionsScheduleAContest" /><label for="SchoolContactsOptionsScheduleAContest">Schedule a Contest</label></div>
                <div class="form-control input-lg"><input type="checkbox" name="refer" @if(isset($options[3])) checked="checked" @endif value="Refer a School for a Commission" id="SchoolContactsOptionsReferASchoolForACommission" /><label for="SchoolContactsOptionsReferASchoolForACommission">Refer a School for a Commission</label></div>
                    </div>
                </div>

                    <input type="hidden" name="contact_id" value="{{$school_contact->id}}">

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

@endsection