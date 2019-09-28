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
                <h2 class="panel-title">Super Contest Question Add (MoneyContest)</h2>
            </header>
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
    abc =;

if(abc != undefined){
    var webrooturl = "/softseven_admin/";
        var imgurl = webrooturl + "img/questionimage/" + abc;
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

    
    $('.nrmodal').click(function(e) {
        var inputid = $(this).parent().parent().find('.mainimage').attr('id');
        $(".modal-body").attr('data-inputid', inputid);
    });
    $('.nrthumb').click(function(e) {
        e.preventDefault();
        var imggg = $(this).attr('data-image');
        var inputid = $(".modal-body").attr('data-inputid');
        var webrooturl = "/softseven_admin/";
        var imgurl = webrooturl + "img/questionimage/" + imggg;

        $("#" + inputid).parent().parent().find('.image_other').val(imggg);
        $("#" + inputid).parent().parent().find('.imgdiv').html('');
        $("#" + inputid).parent().parent().find('.imgdiv').append(
            '<img width="100px;" class="img-responsive" alt="" src="' + imgurl + '">');
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