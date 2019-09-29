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
        <form id="summary-form" class="form-horizontal"  method="post" action="{{route('question.add_notice_submit')}}" enctype="multipart/form-data">	
           @csrf				    
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>
                    </div>

                    <h2 class="panel-title">Notice Add</h2>
                    
                </header>
                <div class="panel-body">
                    <div class="validation-message">
                        <ul></ul>
                    </div>
	                   <div class="form-group">
	                        <label class="col-sm-3 control-label">Message<span class="required">*</span></label>
	                        <div class="col-sm-9">
	                          <textarea name="message" class="form-control input-lg" required="required" cols="30" rows="6" id="NoticeMessage"></textarea>
	                   </div>
                    </div>
                   
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