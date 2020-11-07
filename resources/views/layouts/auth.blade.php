<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Zua Collection @yield('title')</title>
        <!-- ===== Bootstrap CSS ===== -->
        <link href="{{ asset('template/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('template/less/icons/material-design-iconic-font/css/materialdesignicons.min')}}">      
        <!-- ===== Animation CSS ===== -->
        <link href="{{ asset('template/css/animate.css')}}" rel="stylesheet">
        <!-- ===== Custom CSS ===== -->
        <link href="{{ asset('template/css/style.css')}}" rel="stylesheet">
        <!-- ===== Color CSS ===== -->
        <link href="{{ asset('template/css/colors/red.css')}}" id="theme" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

<style>
    html {
        background-image: url('{{asset("template/plugins/images/login-register.jpg")}}');
        background-size: cover;
    }
    body {
        background-image: url('{{asset("template/plugins/images/login-register.jpg")}}');
        background-size: cover;
        height: 0px;    
    }
    .login-box {
        margin-top:30px;
        margin-bottom: 30px;
        border-radius: 10px;
    }
</style>
<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

        <div class="login-box">
            <div class="white-box">
                @yield('content')
            </div>
        </div>
</div>  
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('template/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('template/js/sidebarmenu.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('template/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('template/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('template/js/custom.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{ asset('template/plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>

</body>

</html>