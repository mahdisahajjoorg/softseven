@extends('master')

@section('title','Mathrace : Firstname')

@section('css_js_up')
@endsection

@section('main_content')
<header class="page-header">
    <h2>Firstname</h2>

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
<div class="row">
    <div class="col-md-12">
       
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Super Contest Question Add</h2>

            </header>
              <form action="{{ route('supercontest.store') }}" method="POST">
                @csrf
<div class="panel-body">
                <div class="validation-message">
                    <ul></ul>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Type<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="type" class="form-control input-lg" required="required" id="SupercontestsType">
                        <option value="addition">Addition</option>
                        <option value="multiplication">Multiplication</option>
                        <option value="subtraction">Subtraction</option>
                        <option value="division">Division</option>
                        </select>                    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="name_problem" class="form-control input-lg" required="required" maxlength="100" type="text" id="SupercontestsNameProblem">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Total Number of Problems<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="problem_number" class="form-control input-lg add_field" required="required" maxlength="100" type="text" id="SupercontestsProblemNumber">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Start Date<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="date" class="form-control input-lg" required="required" id="datepicker" maxlength="100" type="date">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Contest Timer<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="timer" class="form-control input-lg" required="required" type="number" id="SupercontestsTimer">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select name="category" class="form-control input-lg" required="required" id="SupercontestsCategory">
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                            <option value="Expert">Expert</option>
                            </select>                    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mathematician Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="mathematician_name" class="form-control input-lg" required="required" maxlength="100" type="text">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Mathematician Score<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input name="mathematician_score" class="form-control input-lg" required="required" maxlength="100" type="text">                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                        <fieldset><legend>Status</legend><input type="hidden" name="data[Supercontests][status]" id="SupercontestsStatus_" value=""><input type="radio" name="status" id="SupercontestsStatus1" required="required" value="1"> Yes <input type="radio" name="status" id="SupercontestsStatus0" required="required" value="0"> No</fieldset>                     </div>
                </div>
                <div class="row"></div><div id="p_scents" class="col-md-10"></div></div>
                <div class="row"></div><div id="p_scents" class="col-md-10"></div></div>
                   
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
@endsection

@section('css_js_down')

<script type="text/javascript">
    $(document).ready(function () {
        $(function() {
    $( "#datepicker" ).datepicker("yy-mm-dd");
     
  });
  
   $(".add_field").keyup(function(){
       var scntDiv = $('#p_scents');
       var total = $('.add_field').val();
       console.log(total);
       if(total != "" ) {
                  for(var i=0; i < total; i++){
       $('<div class="form-group col-md-6"><label class="col-sm-6 control-label">Low Value</label><div class="col-sm-6 remove"><input name="first_value[]" class="form-control input-lg" required="required" type="text"  id="SupercontestQuestionsCategory"/></div></div><div class="form-group col-md-6"><label class="col-sm-6 control-label">High Value</label><div class="col-sm-6 remove"><input name="second_value[]" class="form-control input-lg" required="required" type="text"  id="SupercontestQuestionsCategory"/></div></div>').appendTo(scntDiv);
         }  
                }else{
                $(scntDiv).html('');
                }
                
                 });
                
     
//$(function() {
//        var scntDiv = $('#p_scents');
//        var i = $('#p_scents p').size() + 1;
//        
//        $('#addScnt').click(function(e){
//            e.preventDefault();
//                $('<div class="col-md-10"><div class="form-group col-md-6"><label class="col-sm-6 control-label">First Value</label><div class="col-sm-6 remove"><input name="data[Contestproblems][i][first_value]" class="form-control input-lg" required="required" type="text" ' + i +' id="SupercontestQuestionsCategory"/></div></div><div class="form-group col-md-6"><label class="col-sm-6 control-label">First Value</label><div class="col-sm-6 remove"><input name="data[Contestproblems][i][second_value]" class="form-control input-lg" required="required" type="text" ' + i +' id="SupercontestQuestionsCategory"/></div></div></div><div class="col-md-2"><div class="form-group col-md-2"><a href="#" class="btn btn-primary" id="remScnt">Remove</a></div></div>').appendTo(scntDiv);
//                i++;
//                return false;
//        });
//        
//        $('#remScnt').click(function(e){ 
//            e.preventDefault();
//                if( i > 2 ) {
//                         $(this).parents('.parent').remove();
//                         alert('sdfd');
//                        i--;
//                }
//                return false;
//        });
//});


    });
</script>
 <style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }

</style>
@endsection