@extends('master')

@section('title','Settings')

@section('css_js_up')
@endsection

@section('main_content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.js"></script>

<script>
// Navigation
    (function ($) {

        'use strict';

        var $items = $('.nav-main li.nav-parent');

        function expand(li) {

            li.children('ul.nav-children').slideDown('fast', function () {
                li.addClass('nav-expanded');
                $(this).css('display', '');
                ensureVisible(li);
            });
        }

        function collapse(li) {
            li.children('ul.nav-children').slideUp('fast', function () {
                $(this).css('display', '');
                li.removeClass('nav-expanded');
            });
        }

        function ensureVisible(li) {
            var scroller = li.offsetParent();
            if (!scroller.get(0)) {
                return false;
            }

            var top = li.position().top;
            if (top < 0) {
                scroller.animate({
                    scrollTop: scroller.scrollTop() + top
                }, 'fast');
            }
        }

        $items.find('> a').on('click', function () {

            var prev = $(this).closest('ul.nav').find('> li.nav-expanded'),
                    next = $(this).closest('li');

            if (prev.get(0) !== next.get(0)) {
                collapse(prev);
                expand(next);
            } else {
                collapse(prev);
            }
        });

    }).apply(this, [jQuery]);

</script>                
<style>
    .w_level{
    height: 70px;
    width: 70px;
    background-color: #000000;
    position: absolute;
    margin: 0 auto;
    text-align: center;
    left: 28%;
    top: 21%;
}
    
    
    
</style>

<header class="page-header">
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

	<section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Game Level Settings</h2>

        </header>
	        <div class="panel-body">
	            <div class="validation-message">
	                <ul></ul>
	            </div>
	            <div style="text-align:center;">
	               <img height="120px" src="{{ url('assets/img/questionimage/thumb/'.$data->image) }}" alt="myImage">
	            </div>
	            <br>
            <form id="summary-form" class="form-horizontal"  method="post" action="{{route('question.update_w_level')}}" enctype="multipart/form-data">

            @csrf    
	            
	            <div class="form-group">
	                <label class="col-sm-3 control-label">Wordrece Level</label>
	                <div class="col-sm-9">
	                    <select class="form-control" name="level_data">
                            <?php if ($data->level_data =='1 - 10') { ?>
                               <option value="1 - 10" >1 - 10</option>
                            <?php } ?>
                            <?php if ($data->level_data =='11 - 20') { ?>
                               <option value="11 - 20" >11 - 20</option>
                            <?php } ?>
                            <?php if ($data->level_data =='21 - 30') { ?>
                               <option value="21 - 30" >21 - 30</option>
                            <?php } ?>
                            <?php if ($data->level_data =='31 - 40') { ?>
                               <option value="31 - 40" >31 - 40</option>
                            <?php } ?>
                            <?php if ($data->level_data =='41 - 50') { ?>
                               <option value="41 - 50" >41 - 50</option>
                            <?php } ?>
                            <?php if ($data->level_data =='51 - 60') { ?>
                               <option value="51 - 60" >51 - 60</option>
                            <?php } ?>
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
	                       <input id="simple-color-picker" name="color" type="text" class="form-control" value="{{ url($data->color) }}"/>
	                 <input  name="id" type="hidden" class="form-control" value="<?php echo $data->id; ?>"/>
	                
	                </div>
	            </div>
	               <div class="form-group">
	                <div class="row">
	                    <div class="col-sm-6 col-sm-offset-3 imgdiv"></div>
	                </div>
	                <br>
	                <label class="col-sm-3 control-label">Wordrece Level Image<span class="required">*</span></label>
	                <div class="col-sm-4">
                        <input class="image_other"  name="image_other" type="hidden">
	                    <input type="file" name="image"  class="mainimage form-control input-lg" id="QuestionImage"/>                    </div>
	                <div class="col-sm-2"><button type="button" class="nrmodal" data-toggle="modal"
	                        data-target="#myModal">Select From Gallery</button></div>
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

    <script type="text/javascript">
	    $(document).ready(function () {
	        $(function() {
    	      $('#simple-color-picker').colorpicker();
    	       });
    	    });

        $('.nrmodal').click(function (e) {
            var inputid = $(this).parent().parent().find('.mainimage').attr('id');
            $(".modal-body").attr('data-inputid', inputid);
        });
        $('.nrthumb').click(function (e) {
            e.preventDefault();
            var imggg = $(this).attr('data-image');
          
            var inputid = $(".modal-body").attr('data-inputid');
            var webrooturl ="{{url('/')}}/assets/img/questionimage/thumb/";
            var imgurl = webrooturl + imggg;
         
            $("#" + inputid).parent().parent().find('.image_other').val(imggg);
            $("#" + inputid).parent().parent().find('.imgdiv').html('');
            $("#" + inputid).parent().parent().find('.imgdiv').append('<img width="100px;" class="img-responsive" alt="" src="' + imgurl + '">');
            $(".modal-body").attr('data-inputid', '');
            $("#myModal").modal('hide');

        });
	</script>


@endsection

@section('css_js_down')

@endsection