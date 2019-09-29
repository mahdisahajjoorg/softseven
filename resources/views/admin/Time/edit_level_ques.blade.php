@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<style type="text/css">
    .page-header {
    background: #171717;
    border-bottom: none;
    border-left: 1px solid #3a3a3a;
    box-shadow: 1px 3px 0 1px #cccccc;
    height: 50px;
    margin: -41px -39px 54px -41px;
    padding: 0;
}
</style>

              
<section class="content-body" role="main">
   <div class="row">
    <div class="col-md-12">
        <form  class="form-horizontal"  method="post" action="{{route('question.update_time_level_question')}}" enctype="multipart/form-data">	
        @csrf

        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Update Time Qustions</h2>
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
                    <label class="col-sm-3 control-label">Game<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select class="form-control" >
                            <option>TimeContest</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $info->id; ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="time_contest_name" value="<?php echo $info->time_contest_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Total Number Of problems</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="total_number_problem" value="<?php echo $info->total_number_problem; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Start Date*</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="start_date" value="<?php echo $info->start_date; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Timer*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contest_time" value="<?php echo $info->contest_time; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="time_cat_id" class="form-control input-lg" required="required" id="GeloleveCategory">
                        	<option value="<?php echo $info->time_cat_id; ?>"><?php echo $info->time_cat_name; ?></option>
                           @foreach($data as $infos)
                        	<option value="<?php echo $infos->time_cat_id; ?>"><?php echo $infos->time_cat_name; ?></option>
                           @endforeach
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Unlock Score</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="unlock_score" value="<?php echo $info->unlock_score; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <fieldset><legend>Status</legend>
                        	<?php if ($info->unlock_score ==1) { ?>
                        	 <input type="radio" name="status" id="GeloleveStatus1" required="required" value="1" checked /> Yes
                        	 <input type="radio" name="status" id="GeloleveStatus0" required="required" value="0" /> No
                        	<?php }else{ ?>
                        	 <input type="radio" name="status" id="GeloleveStatus1" required="required" value="1"  /> Yes
                        	 <input type="radio" name="status" id="GeloleveStatus0" required="required" value="0" checked /> No
                        	<?php } ?>
                        	
                        </fieldset>
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
   </section>
</div>


@endsection

@section('css_js_down')

@endsection

<style type="text/css">
.fancybox-custom .fancybox-skin {
    box-shadow: 0 0 50px #222;
}
</style> 