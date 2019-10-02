<!DOCTYPE html>
<html>
    <head>
        <title>
            Mathrace: @yield('title')
        </title>
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="icon" href="{{asset('assets/img/cake.icon.png')}}">   
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/magnific-popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/skins/default.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/theme-custom.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/sweet-alert.css')}}">

        <script src="{{asset('assets/js/assets/vendor/modernizr/modernizr.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

        <script src="{{asset('assets/js/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-validation/jquery.validate.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.custom.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.init.js')}}"></script>

        <script src="{{asset('assets/js/sweet-alert.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/tables/examples.datatables.default.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/tables/examples.datatables.row.with.details.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/tables/examples.datatables.tabletools.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <style type="text/css">
            table .btn{padding: 1px 12px;}
        </style>
        @yield('css_js_up')
    </head>
    <body>
        <section class="body">
            @include('admin.layout.header')

            <div class="inner-wrapper">
                @include('admin.layout.sidebar_left')
                <section class="content-body" role="main">
                    @yield('main_content')
                </section>
               
            </div>

            @include('admin.layout.sidebar_right')
        </section>
<script type='text/javascript'>
        jQuery(document).ready(function(){

jQuery('#flashMessage').addClass('alert-info');

          var leftside= parseInt(jQuery('#menu').height())+parseInt(400);
          //alert(leftside);
          jQuery('.inner-wrapper').css('min-height', leftside+'px');
        });
        </script>

        <?php //echo $this->element('sql_dump'); ?>
        @yield('css_js_down')
    </body>
</html>
