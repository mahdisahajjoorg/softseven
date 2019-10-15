@extends('master')

@section('title','Employees')

@section('css_js_up')
@endsection
@section('main_content')
<section class="content-body" role="main">
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('nonstudent_payments.update', $student->id) }}" class="form-horizontal" method="post"> 
        @csrf   
        @method("PUT")                   
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Non-student Payment Add</h2>
                    
                </header>
                <div class="panel-body">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Student Name <span class="required">*</span></label>
                        <div class="col-sm-9">
                           <select class="form-control" style="width:500px" name="student" >
                               <option value="{{ $student->id }}">{{ $student->student_info->screen_name }}</option>
                           </select>                   
                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Status <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="payment_status" class="form-control input-lg" required="required">
                                <option value="Completed" {{ $student=='Completed'?'selected':'' }}>Completed</option>
                                <option value="Pending" {{ $student=='Pending'?'selected':'' }}>Pending</option>
                                </select>                       
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Expire Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                            <select name="expire_date[month]" class="form-control input-lg datepicker" required="required" style="display:inline-block;width:auto;" id="NonstudentPaymentExpireDateMonth">
                                    <option value="01" {{ $recent_month==1?'selected':'' }}>January</option>
                                    <option value="02" {{ $recent_month==2?'selected':'' }}>February</option>
                                    <option value="03" {{ $recent_month==3?'selected':'' }}>March</option>
                                    <option value="04" {{ $recent_month==4?'selected':'' }}>April</option>
                                    <option value="05" {{ $recent_month==5?'selected':'' }}>May</option>
                                    <option value="06" {{ $recent_month==6?'selected':'' }}>June</option>
                                    <option value="07" {{ $recent_month==7?'selected':'' }}>July</option>
                                    <option value="08" {{ $recent_month==8?'selected':'' }}>August</option>
                                    <option value="09" {{ $recent_month==9?'selected':'' }}>September</option>
                                    <option value="10" {{ $recent_month==10?'selected':'' }} >October</option>
                                    <option value="11" {{ $recent_month==11?'selected':'' }}>November</option>
                                    <option value="12" {{ $recent_month==12?'selected':'' }}>December</option>
</select>-<select name="expire_date[day]" class="form-control input-lg datepicker" required="required" style="display:inline-block;width:auto;" id="NonstudentPaymentExpireDateDay">
    @for ($i=1; $i<=31; $i++)
        <option value="{{ $i }}" {{ $recent_day==$i?'selected':'' }}>{{ $i }}</option>
    @endfor


</select>-<select name="expire_date[year]" class="form-control input-lg datepicker" required="required" style="display:inline-block;width:auto;" id="NonstudentPaymentExpireDateYear">
    @for($i=0; $i<20;$i++)
        <option value="{{ $recent_year }}">{{ $recent_year }}</option>
        @php
            $recent_year--;
        @endphp
    @endfor
</select>                        </div>
                    </div>
                   
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </div></section>
      </form> 
    </div>
</div>                </section>
@endsection

@section('css_js_down')

@endsection