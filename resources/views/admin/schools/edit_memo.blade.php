@extends('master')

@section('title','Edit Memo')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
    <form action="{{route('school.edit_memo_form_submit')}}" method="post" class="form-horizontal" id="summary-form">			    
            @csrf
        <div style="display:none;">
<input type="hidden" value="POST" name="_method">
</div>				    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">School Memo Edit</h2>
                    
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
                        <label class="col-sm-3 control-label">Select School <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <select class="form-control input-lg" name="school">
                            @if($schools->count()>0)
                            @foreach($schools as $s)
                            @if($memo->school_id==$s->id)
                            <option value="{{$s->id}}" selected>{{$s->school_name}}</option>
                            @else
                             <option value="{{$s->id}}">{{$s->school_name}}</option>
                            @endif
                            @endforeach
                            @endif
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Memo <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <textarea cols="30" rows="6" class="form-control input-lg" name="memo">{{$memo->memo}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Current Date</label>
                        <div class="col-sm-9">
                          {{$memo->date}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="date" class="form-control" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <input type="hidden" value="{{$memo->id}}" name="memo_id">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </footer>
            </section>
    </form>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script>

jQuery(document).ready(function(){
    //jQuery('.datepicker').datepicker();

});
$('#datetimepicker1').datetimepicker({
			format: 'DD-MM-YYYY LT'
		});
</script>
@endsection

@section('css_js_down')
@endsection