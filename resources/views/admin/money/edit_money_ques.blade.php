@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<header class="page-header">

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span> Softseven Employee</span></li>
            <li><span>Index</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<section class="content-body" role="main">
  <div class="row">
    <div class="col-md-12">
        <form action="{{route('question.update_money_level_question_form')}}" id="summary-form" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">

        @csrf     
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Add Money Qustions add</h2>
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
                        <select class="form-control">
                            <option >MoneyContest</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                <input type="hidden" name="created_date" value="<?php echo $data->created_date; ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="money_contest_name" value="<?php echo $data->money_contest_name; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Total Number Of problems</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="total_number_problem" value="<?php echo $data->total_number_problem; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Start Date*</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="start_date" value="<?php echo $data->start_date; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Timer*</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="contest_time" value="<?php echo $data->contest_time; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="money_cat_id" class="form-control input-lg" required="required" id="MoneylevelCategory">
                         
						<option value="<?php echo $data->money_cat_id; ?>"><?php echo $data->money_cat_name; ?></option>
                        @foreach($cat as $Category)
                         <option value="<?php echo $Category->money_cat_id; ?>"><?php echo $Category->money_cat_name; ?></option>
                        @endforeach
						</select>                    
					</div>
                </div>
                      <div class="form-group">
                    <label class="col-sm-3 control-label">Unlock Score</label>
                    <div class="col-sm-9">
                        <input name="unlock_score" class="form-control input-lg" type="text" id="MoneylevelUnlockScore" value="<?php echo $data->unlock_score; ?>"/>                    </div>
                </div>
     
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <fieldset><legend>Status</legend>
                            <?php if ($data->status == 1) { ?>
                               <input type="radio" name="status" id="MoneylevelStatus1" required="required" value="1" checked /> Yes 
                               <input type="radio" name="status" id="MoneylevelStatus0" required="required" value="0" /> No
                            <?php }else{ ?>
                               <input type="radio" name="status" id="MoneylevelStatus1" required="required" value="1"  /> Yes 
                               <input type="radio" name="status" id="MoneylevelStatus0" required="required" value="0" checked/> No
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

    <style type="text/css">
	.fancybox-custom .fancybox-skin {
	    box-shadow: 0 0 50px #222;
	}
	</style> 

@endsection

@section('css_js_down')

@endsection