<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('webpg_assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('webpg_assets/css/datatables.min.css')}}" rel="stylesheet">
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.css"/>
     Custom CSS -->
    <link href="{{asset('webpg_assets/css/shop-item.css')}}" rel="stylesheet">
    <link href="{{asset('webpg_assets/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('webpg_assets/css/bootstrap-select2.css')}}" rel="stylesheet">
    <script src="{{asset('webpg_assets/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('webpg_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('webpg_assets/js/select2.js')}}"></script>
    <script src="{{asset('webpg_assets/js/jquery.dataTables.js')}}"></script>
   <!-- <script type="text/javascript" src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        nav{
            position: relative !important;
        }
        body{
            padding-top:0px !important;
        }
		td{
            line-height: 10px;
        }
    </style>
@yield('css_js_up')
</head>
<html lang="en">
<body>
 @yield('nav')
 @yield('main_content')
 @yield('css_js_down')
</body>
</html>