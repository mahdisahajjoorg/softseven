@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')
               
<section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Question Add</h2>

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

                @if(Session::get('success_message'))
			        <div class="alert alert-danger">
			        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			            {{Session::get('success_message')}}
			        </div>
			    @endif
                

                <div class="validation-message">
                    <ul></ul>
                </div>
            <form id="summary-form" class="form-horizontal"  method="post" action="{{route('question.edit_w_question_form_submit')}}" enctype="multipart/form-data">	
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
	                    <label class="col-sm-3 control-label">Level<span class="required">*</span></label>
	                    <div class="col-sm-9">
	                        <select name="game_level" class="form-control input-lg" required="required" id="QuestionGameLevel">
	                        	<?php for ($i=1; $i <61 ; $i++) { ?>
	                        		<?php if ($data->game_level == $i) {  ?>
	                        			<option value="<?php echo $data->game_level ?>" selected="selected"><?php echo $data->game_level ?>
	                        			</option>
	                        	    <?php	}else{ ?>
	                        	    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	                        	    <?php  } ?>
	                        	<?php } ?>
							</select>                    
						</div>
	                </div>

	                <div id="visualdiv">
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Correct Answer</label>
	                        <div class="col-sm-9">
	                            <input name="answer1" class="form-control input-lg" maxlength="255" type="text" value="<?php echo $data->answer1; ?>" id="QuestionAnswer1"/>                        </div>
	                    </div> 
	                    <input type="hidden" name="id" value="<?php echo $data->id ?>">
	                    <input type="hidden" name="game_id" value="<?php echo $data->game_id; ?>">
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Wrong Answer1</label>
	                        <div class="col-sm-9">
	                            <input name="answer2" class="form-control input-lg" maxlength="255" type="text" value="<?php echo $data->answer2; ?>" id="QuestionAnswer2"/>                        </div>
	                    </div> 
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Wrong Answer2</label>
	                        <div class="col-sm-9">
	                            <input name="answer3" class="form-control input-lg" maxlength="255" type="text" value="<?php echo $data->answer3; ?>" id="QuestionAnswer3"/>                        </div>
	                    </div> 
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Wrong Answer3</label>
	                        <div class="col-sm-9">
	                            <input name="answer4" class="form-control input-lg" maxlength="255" type="text" value="<?php echo $data->answer4; ?>" id="QuestionAnswer4"/>                        </div>
	                    </div> 
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Attach Mp3 File<span class="required">*</span></label>
	                        <div class="col-sm-4">
	                            <input type="file" name="questionmp3" accept="audio/*"  class="form-control input-lg" id="QuestionQuestionmp3"/>                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Attach hint mp3<span class="required">*</span></label>
	                        <div class="col-sm-4">
	                          
	                            <input type="file" name="hintmp3" accept="audio/*"  class="form-control input-lg" id="QuestionHintmp3"/>                        </div>
	                    </div>


	                    <div class="form-group">
	                        <label class="col-sm-3 control-label">Image<span class="required">*</span></label>
	                        <div class="col-sm-4">
	                            <input class="image_other"  name="image_other" type="hidden">
	                            <input type="file" name="image"  class="mainimage form-control input-lg" accept="image/*" id="QuestionImage"/></div>
	                        <div class="col-sm-2"><button type="button" class="nrmodal" data-toggle="modal" data-target="#myModal">Select From Gallery</button></div>
	                        <div class="col-sm-2 imgdiv">
	                               <img src="{{url('assets/img/questionimage/thumb/'.$data->image)}}" class="img-responsive" height="150px;" alt="" />                        
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
        </section>
    </div>
</div>
	<script type="text/javascript">
	    $(document).ready(function () {
	        
	        $('.nrmodal').click(function (e) {
	            var inputid = $(this).parent().parent().find('.mainimage').attr('id');
	            $(".modal-body").attr('data-inputid', inputid);
	        });
	        $('.nrthumb').click(function (e) {
	            e.preventDefault();
	            var imggg = $(this).attr('data-image');
	          
	            var inputid = $(".modal-body").attr('data-inputid');
	            var webrooturl = "/softseven/public/assets/img/questionimage/thumb/";
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
    </section>
   
</div>


@endsection

@section('css_js_down')

@endsection