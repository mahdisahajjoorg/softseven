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

<section class="panel">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
            <a href="#" class="fa fa-times"></a>
        </div>

        <h2 class="panel-title">Wordrace Question Setting Add</h2>

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
    @if(Session::get('success_message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{Session::get('success_message')}}
        </div>
    @endif
    <form id="summary-form" class="form-horizontal"  method="post" action="{{route('question.add_question_setting_form_submit')}}" enctype="multipart/form-data">	
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

					
				<div class="panel-body">

					   <div class="form-group">
			                <label class="col-sm-3 control-label">Wordrece Level</label>
			                <div class="col-sm-9">
			                    <select class="form-control" name="level_data">
			                    <option value="1 - 10" >1 - 10</option>
			                    <option value="11 - 20" >11 - 20</option>
			                    <option value="21 - 30" >21 - 30</option>
			                    <option value="31 - 40" >31 - 40</option>
			                    <option value="41 - 50" >41 - 50</option>
			                    <option value="51 - 60" >51 - 60</option>
			                    </select>
			                </div>
			            </div>	

			            <div class="form-group">
			                <label class="col-sm-3 control-label">Wordrece Level Color</label>
			                <div class="col-sm-9">
			                       <input id="simple-color-picker2" name="color" type="text" class="form-control"/>
			                </div>
			            </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Image<span class="required">*</span></label>
	                        <div class="col-sm-4">
	                            <input class="image_other"  name="image_other" type="hidden">
	                            <input type="file" name="image"  class="mainimage form-control input-lg" accept="image/*" id="QuestionImage"/></div>
	                        <div class="col-sm-2"><button type="button" class="nrmodal" data-toggle="modal" data-target="#myModal">Select From Gallery</button></div>
	                        <div class="col-sm-2 imgdiv">
	                               <img src="" class="img-responsive" height="150px;" alt="" />                        
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
            </form>

	        <script type="text/javascript">
			    $(document).ready(function () {

			    	$(function() {
		    	      $('#simple-color-picker2').colorpicker();
		    	       });
			        
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
			<style type="text/css">
			    .fancybox-custom .fancybox-skin {
			        box-shadow: 0 0 50px #222;
			    }

			</style>
	    </div>	
</section>

@endsection

@section('css_js_down')

@endsection