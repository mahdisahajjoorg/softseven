@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<section class="content-body" role="main">
	<div class="row">
	    <div class="col-md-12">
	        <form  class="form-horizontal"  method="post" action="{{route('question.add_Geo_question_form_submit')}}" enctype="multipart/form-data">	
                @csrf

	        <section class="panel">
	            <header class="panel-heading">
	                <div class="panel-actions">
	                    <a href="#" class="fa fa-caret-down"></a>
	                    <a href="#" class="fa fa-times"></a>
	                </div>
	                <h2 class="panel-title">Add GeoRace Qustions add</h2>
	            </header>
	            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
	            <div class="panel-body">
	                <div class="validation-message">
	                    <ul></ul>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Game<span class="required">*</span></label>
	                    <div class="col-sm-9">
	                        <select class="form-control">
	                            <option>GeoRace</option>
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Contest Name</label>
	                    <div class="col-sm-9">
	                        <input type="text" class="form-control" name="georace_contest_name">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Total Number Of problems</label>
	                    <div class="col-sm-9">
	                        <input type="text" class="form-control" name="total_number_problem">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Contest Start Date*</label>
	                    <div class="col-sm-9">
	                        <input type="date" class="form-control" name="start_date">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Contest Timer*</label>
	                    <div class="col-sm-9">
	                        <input type="text" class="form-control" name="contest_time">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label">Category<span class="required">*</span></label>
	                    <div class="col-sm-9">
	                        <select name="category" class="form-control input-lg" required="required" id="GeloleveCategory">
	                         @foreach($cat as $category)
	                            <option value="<?php echo $category->georace_cat_id; ?>"><?php echo $category->georace_cat_name; ?></option>
	                         @endforeach 
	                        </select>                    
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-3 control-label"></label>
	                    <div class="col-sm-9">
	                        <fieldset><legend>Status</legend>
	                        	<input type="radio" name="status" id="GeloleveStatus1" required="required" value="1" /> Yes <input type="radio" name="status" id="GeloleveStatus0" required="required" value="0" /> No</fieldset>                    
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
	<style type="text/css">
	.fancybox-custom .fancybox-skin {
	    box-shadow: 0 0 50px #222;
	}
	</style>                
	</section>

@endsection

@section('css_js_down')

@endsection