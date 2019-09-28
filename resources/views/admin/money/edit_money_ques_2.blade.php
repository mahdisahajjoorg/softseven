@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')

<section class="panel">
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
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Super Contest Question Add (MoneyContest)</h2>
            </header>

            <form id="summary-form" class="form-horizontal"  method="post" action="{{route('question.update_money_2_submit')}}" enctype="multipart/form-data">	
            @csrf

            <input type="hidden" name="id" value="<?php echo $data->id; ?>">

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
                <div class="validation-message">
                    <ul></ul>
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
                        <select name="contest" class="form-control input-lg" required id="questionContest">
                         <option value="<?php echo $data->money_contest_id; ?>"><?php echo $data->money_contest_name; ?></option>
                         @foreach($contest_name as $name)
                         <option value="<?php echo $name->money_contest_id; ?>"><?php echo $name->money_contest_name; ?></option>
                         @endforeach
                        </select>                   
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Correct Answer</label>
                    <div class="col-sm-9">
                <input type="text" class="form-control" name="answer1" value="<?php echo $data->answer1; ?>">

                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hint</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="hint" value="<?php echo $data->hint; ?>">
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


<script type="text/javascript">
   $(document).ready(function() {
    var abc ="";
    abc ='<?php  echo $data->Image; ?>';
if(abc != undefined){
    var webrooturl = "/softseven/public/";
        var imgurl = webrooturl + "assets/img/questionimage/thumb//" + abc;
    $('.imgdiv').append(
                    '<img width="100px;" class="img-responsive" alt="" src="' + imgurl + '">');
            }  

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



         </section>
   
</div>   

@endsection

@section('css_js_down')

@endsection