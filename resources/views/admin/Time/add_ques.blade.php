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
             
<section class="content-body" style="margin: -4%;" role="main">
	<header class="page-header">
	    <h2>Questions</h2>

	    <div class="right-wrapper pull-right">
	        <ol class="breadcrumbs">
	            <li>
	                <a href="index.html">
	                    <i class="fa fa-home"></i>
	                </a>
	            </li>
	            <li><span>Questions</span></li>
	            <li><span>Index</span></li>
	        </ol>

	        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	    </div>
	</header>
   <section class="panel">
   	@if(Session::get('success_message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success_message')}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Super Contest Question Add (TimeContest)</h2>
            </header>
            <div class="panel-body">
                <div class="validation-message">
                    <ul></ul>
                </div>

                <form  class="form-horizontal"  method="post" action="{{route('question.add_time_question_form_submit')}}" enctype="multipart/form-data">	
                    @csrf

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
					    <div class="modal-content">
					        <div class="modal-header">
					            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					            <h4 class="modal-title" id="myModalLabel">Choose from Gallery</h4>
					        </div>
					        <div class="modal-body">
					            <div class="portfolio-item-holder row" data-index="0" id="content_img">
					                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">

					                	<?php foreach ($img as $key => $value) { ?>
					                		<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
						                        <div class="thumbnail">
						                            <div class="thumb-preview">
						                                <a class="thumb-image nrthumb" data-image="<?php echo $value; ?>"href="#"><img src="{{ url('assets/img/questionimage/thumb/'.$value) }}" class="img-responsive" height="150px;" alt="" /></a>
						                            </div>
						                        </div>
						                    </div>
					                	<?php } ?>
					                </div>
					            </div>
					        </div>
					        <div class="modal-footer">
					            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					        </div>
					    </div>
					</div>
				</div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 imgdiv"></div>
                    </div>
                    <br>
                    <label class="col-sm-3 control-label">Image<span class="required">*</span></label>
                    <div class="col-sm-4">
                        <input class="image_other" name="image_other" type="hidden">
                        <input type="file" name="image"  class="mainimage form-control input-lg" id="QuestionImage"/>                    </div>
                    <div class="col-sm-2"><button type="button" class="nrmodal" data-toggle="modal"
                            data-target="#myModal">Select From Gallery</button></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">contest Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="contest" class="form-control input-lg" required="required" id="QuestionContest">
                        	@foreach($data as $info)
                        	<option value="<?php echo $info->id; ?>"><?php echo $info->time_contest_name; ?></option>
                        	@endforeach
                        </select>                    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Correct Answer</label>
                    <div class="col-sm-9">
                        <input name="answer1" class="form-control input-lg" maxlength="255" type="text" id="QuestionAnswer1"/>
                    </div>
                </div>
               
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hint</label>
                    <div class="col-sm-9">
                        <input name="hint" class="form-control input-lg" type="text" id="QuestionHint"/>
                    </div>
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

<script type="text/javascript">
   $(document).ready(function() {
    
    $("#QuestionImage").change(function() {
        readURL(this);
    });

    function readURL(input) {
        console.log('QuestionImage');
        $('.imgdiv').html('');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.imgdiv').append(
                    '<img width="100px;" class="img-responsive" alt="" src="' + e.target.result + '">');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    
    $('.nrmodal').click(function (e) {
        var inputid = $(this).parent().parent().find('.mainimage').attr('id');
        $(".modal-body").attr('data-inputid', inputid);
    });
    $('.nrthumb').click(function (e) {
        e.preventDefault();
        var imggg = $(this).attr('data-image');
      
        var inputid = $(".modal-body").attr('data-inputid');
        var webrooturl ="/softseven/public/assets/img/questionimage/thumb/";
        var imgurl = webrooturl + imggg;
     
        $("#" + inputid).parent().parent().find('.image_other').val(imggg);
        $("#" + inputid).parent().parent().find('.imgdiv').html('');
        $("#" + inputid).parent().parent().find('.imgdiv').append('<img width="100px;" class="img-responsive" alt="" src="' + imgurl + '">');
        $(".modal-body").attr('data-inputid', '');
        $("#myModal").modal('hide');

    });


});
</script>


@endsection

@section('css_js_down')

@endsection