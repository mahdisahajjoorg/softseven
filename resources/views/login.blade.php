<!DOCTYPE html>
<html>
    <head>
        <title>
            Matherace: Users
        </title>
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="icon" href="{{asset('assets/img/cake.icon.png')}}">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/font-awesome/css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/magnific-popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/skins/default.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/assets/stylesheets/theme-custom.css')}}">
        <script src="{{asset('assets/js/assets/vendor/modernizr/modernizr.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/js/assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.custom.js')}}"></script>
        <script src="{{asset('assets/js/assets/javascripts/theme.init.js')}}"></script>
    </head>
    <body>
        <section class="body-sign">
            <div class="center-sign">
                <a href="{{route('home_base.login_form')}}" class="logo">
                     <img src="{{asset('assets/img/logo.png')}}" height="54">
                </a>

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
                @if(Session::get('error_message'))
                <div class="alert alert-danger">
                    <ul>
                      <li>{{Session::get('error_message')}}</li>
                    </ul>
                </div>
                @endif            
    <form action="{{route('home_base.login_form_submit')}}" method="post">
    @csrf
    <div class="form-group mb-lg">
        <label>Email</label>
        <div class="input-group input-group-icon">
            <input type="text" name="email" class="form-control input-lg">
            <span class="input-group-addon">
                <span class="icon icon-lg">
                    <i class="fa fa-user"></i>
                </span>
            </span>
        </div>
    </div>
    <div class="form-group mb-lg">
        <div class="clearfix">
            <label class="pull-left">Password</label>
            <?php //echo  $this->Html->link('Forget Password?', array('controller' => 'users', 'action' => 'forget_password'),array('class' => 'pull-right', 'escape' => false));?>
        </div>
        <div class="input-group input-group-icon">
            <input type="password" name="password" class="form-control input-lg">
            <span class="input-group-addon">
                <span class="icon icon-lg">
                    <i class="fa fa-lock"></i>
                </span>
            </span>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-4 text-right">
            <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
        </div>
    </div>

    </form>
</div>
                

<!--                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2014. All Rights Reserved.</p>
            -->
            </div>
        </section>
        <?php //echo $this->element('sql_dump'); ?>
    </body>
</html>
