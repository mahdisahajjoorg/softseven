@extends('master')

@section('title','Add Memo')

@section('css_js_up')
@endsection

@section('main_content')
<div class="row">
    <div class="col-md-12">
			<form action="{{route('school.add_memo_form_submit')}}" method="post" class="form-horizontal" id="summary-form">			    
            @csrf
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">School Memo Add</h2>
                    
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
                             <option value="{{$s->id}}">{{$s->school_name}}</option>
                            @endforeach
                            @endif
                        </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Memo <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <textarea cols="30" rows="6" class="form-control input-lg" name="memo">
                        </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Date <span class="required">*</span></label>
                        <div class="col-sm-9">
                        <input type="datetime-local" class="form-control input-lg" style="display:inline-block;width:auto;" name="date">
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
    //jQuery('.datepicker').datepicker();
});

</script>


@endsection

@section('css_js_down')
@endsection