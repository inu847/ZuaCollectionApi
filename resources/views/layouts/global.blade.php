<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Zua Collection @yield("title")</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- ===== Bootstrap CSS ===== -->
        <link href="{{ asset('template/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- ===== Plugin CSS ===== -->
        <link href="{{ asset('template/plugins/components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
        <link href="{{ asset('template/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
        <link href='{{ asset("template/plugins/components/fullcalendar/fullcalendar.css")}}' rel='stylesheet'>
        <!-- ===== Animation CSS ===== -->
        <link href="{{ asset('template/css/animate.css')}}"  rel="stylesheet">
        <!-- ===== Custom CSS ===== -->
        <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
        <!-- ===== Color CSS ===== -->
        <link href="{{ asset('template/css/colors/red.css')}}" id="theme" rel="stylesheet">
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
        .text {
            white-space: nowrap; 
            color: white;
            font-size: 20px;
            position: absolute;
            overflow: hidden;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }
        .container:hover .overlay {
            width: 100%;
            left: 0;
        }
        .overlay {
            position: absolute;
            bottom: 0;
            left: 100%;
            right: 0;
            background-color: white;
            overflow: hidden;
            width: 0;
            height: 100%;
            transition: .5s ease;
        }
        .container {
            position: relative;
            width: 88%;
        }
        .image {
            display: block;
            width: 100%;
            height: auto;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            margin-top: 40px;
        }
        .modal-content {
            margin: auto;
            margin-top: 40px; 
            display: block;
            max-width: 400px;
        }
        #caption {
            margin-left: 475px;
            margin-right: 425px;
            /* margin: auto; */
            display: block;
            width: 80%;
            max-width: 400px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }
        /* The Close Button */
        .close {
            margin-right: 30px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }
        .close:hover, .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
        
        .select-sim {
        width:425px;
        height:50px;
        line-height:22px;
        vertical-align:middle;
        position:relative;
        background:white;
        border:1px solid #ccc;
        overflow:hidden;
        }

        .select-sim::after {
        content:"▼";
        font-size:1em;
        font-family:arial;
        position:absolute;
        top:50%;
        right:5px;
        transform:translate(0, -50%);
        }

        .select-sim:hover::after {
        content:"";
        }

        .select-sim:hover {
        overflow:visible;
        }

        .select-sim:hover .options .option label {
        display:inline-block;
        }

        .select-sim:hover .options {
        background:white;
        border:1px solid #ccc;
        position:relative;
        top:-1px;
        left:-1px;
        /* width:100%; */
        height:300%;
        overflow-y:scroll;
        }

        .select-sim .options .option {
        overflow:hidden;
        height: 50%;
        width: 30%;
        position: relative;
        }

        .select-sim:hover .options .option {
        height: 80%;
        width: 80%;
        margin-bottom: 10px;
        overflow:hidden;
        }

        .select-sim .options .option img {
        vertical-align:middle;
        height: 50%;
        width: 30%;
        }

        .select-sim .options .option label {
        display:none;
        }

        .select-sim .options .option input {
        width:0;
        height:0;
        overflow:hidden;
        margin:0;
        padding:0;
        float:left;
        display:inline-block;
        /* fix specific for Firefox */
        position: absolute;
        left: -10000px;
        }

        .select-sim .options .option input:checked + label {
        display:block;
        
        }

        .select-sim:hover .options .option input + label {
        display:block;
        }

        .select-sim:hover .options .option input:checked + label {
        background:#fffff0;
        }

        /*dropdown*/

        /* *{
        padding: 0;
        margin: 0;
        font-family: 'Lato', sans-serif;
        box-sizing: border-box;
        }
        .float-right{
        float: right;
        }
        .fa{
        font-size: .8em;
        line-height: 22px !important;
        }
        dropdown{
        display: inline-block;
        margin: 20px 50px; 
        }
        dropdown label, dropdown ul li{
        display: block;
        width: px;
        background: #191919;
        opacity: 0.9;
        padding: 15px 20px;
        }
        dropdown label:hover, dropdown ul li:hover{
        background: #4D4D4D;
        color: white;
        cursor: pointer;
        }
        dropdown label{
        color: #B2B2B2;
        border-radius: 0 5px 0 0; 
        position: relative;
        z-index: 2;
        }
        dropdown input{
        display: none;
        }
        dropdown input ~ ul{
        position: relative;
        visibility: hidden;
        opacity: 0;
        top: -20px;
        z-index: 1;
        }
        dropdown input:checked + label{
        background: #4D4D4D;
        color: white;
        }

        dropdown input:checked ~ ul{
        visibility: visible;
        opacity: 1;
        top: 0;
        }
        .left {
        float: left;
        }
        .right {
        float: right;
        }
        .monthname {
        width: 17em;
        
        }
        .pointer {
        cursor: pointer;
        }
        body {
        font-family: 'Lato',sans-serif;
        padding: 1em 0;
        }
        .group:after {
            content: "";
            display: table;
            clear: both;
        }
        .calendar p {
            margin-bottom: .5em;
            color: #FFFFFF;
        }
        .calendar {
            background: #222;
            color: #ddd;
            padding: .5em .5em 1em;
            max-width: 20em;
            min-height: 15em;
            margin: .5em auto;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
        .calendar li {
            float: left;
            width: -webkit-calc(100%/7);
            text-align: center;
            padding: .25em 0;
            cursor: pointer;
            border-bottom: 1px solid #444;
        }
        .calendar li:hover, .calendar li.red {
            color: red;
        }
        .calendar li:nth-child(-n+7) {
            color: #666;
        }
        .center {
            text-align: center;
        } */
    </style>
    <body class="mini-sidebar fix-header">
        <!-- ===== Main-Wrapper ===== -->
        <div id="wrapper">
            <div class="preloader">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <!-- ===== Top-Navigation ===== -->
            <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">
                    <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                    <div class="top-left-part">
                        <a class="logo" href="{{ route('dasboard.index')}}">
                            <b>
                                <img src="{{ asset('template/plugins/images/logo.png')}}" alt="home" />
                            </b>
                            <span>
                                Zua Collection
                            </span>
                        </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-left hidden-xs">
                        <li>
                            <form role="search" class="app-search hidden-xs">
                                <i class="icon-magnifier"></i>
                                <input type="text" placeholder="Search..." class="form-control">
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                                <i class="icon-speech"></i>
                                <span class="badge badge-xs badge-danger">6</span>
                            </a>
                            <ul class="dropdown-menu mailbox animated bounceInDown">
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <a href="javascript:void(0);">
                                            <div class="user-img">
                                                <img src="{{ asset('template/plugins/images/users/1.jpg')}}" alt="user" class="img-circle">
                                                <span class="profile-status online pull-right"></span>
                                            </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5>
                                                <span class="mail-desc">Just see the my admin!</span>
                                                <span class="time">9:30 AM</span>
                                            </div>
                                        </a>
                                    <a class="text-center" href="javascript:void(0);">
                                        <strong>See all notifications</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                                <i class="icon-calender"></i>
                            </a>
                            <div class="dropdown-menu dropdown-tasks animated slideInUp" >
                                {{-- <div class="calendar">
                                        <div class="group">
                                            <p class="left pointer minusmonth">&laquo;</p>
                                            <p class="left monthname center pointer"></p>
                                            <p class="right pointer addmonth">&raquo;</p>
                                        </div>
                                        <ul class="group">
                                            <li>Mo</li>
                                            <li>Tu</li>
                                            <li>We</li>
                                            <li>Th</li>
                                            <li>Fr</li>
                                            <li>Sa</li>
                                            <li>Su</li>
                                        </ul>
                                </div>      
                            </div>
                        </li> --}}
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu animated fadeIn " aria-labelledby="navbarDropdown">
                                <a class="drop-title" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
            </nav>
            <!-- ===== Top-Navigation-End ===== -->
            <!-- ===== Left-Sidebar ===== -->
            <aside class="sidebar">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        <ul id="side-menu">
                            <li>
                                <a class="active waves-effect" href="{{ route('dasboard.index')}}" aria-expanded="false">
                                    <i class="icon-screen-desktop fa-fw"></i> 
                                    <span class="hide-menu"> Dashboard </span>
                                </a>
                            </li>
                            <li class="two-column">
                                <a class="waves-effect" href=" {{route('baju.index')}} " aria-expanded="false">
                                    <i class="icon-equalizer fa-fw"></i> 
                                    <span class="hide-menu">Manage Order</span></a>
                            </li>
                            <li class="two-column">
                            <a class="waves-effect" href="{{ route('pages.index')}}" aria-expanded="false">
                                    <i class="icon-docs fa-fw"></i> 
                                    <span class="hide-menu"> Pages</span></a>
                                {{-- <ul aria-expanded="false" class="collapse">
                                    <li><a href="starter-page.html">Starter Page</a></li>
                                </ul> --}}
                            </li>
                            <li>
                            <a class="waves-effect" href=" {{ route('baju.create')}} " aria-expanded="false">
                                    <i class="icon-notebook fa-fw"></i> 
                                    <span class="hide-menu"> Order </span></a>
                                    {{-- <ul aria-expanded="false" class="collapse">
                                        <li><a href="panels-wells.html">Ukuran Badan</a></li>
                                        <li><a href="panels-wells.html">Ukuran Baju Jadi</a></li>
                                    </ul> --}}
                            </li>
                            <li>
                                <a class="waves-effect" href="{{ route('galeri.index')}}" aria-expanded="false">
                                    <i class="icon-layers fa-fw"></i> 
                                    <span class="hide-menu"> Galeri</span></a>
                                {{-- <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="calendar.html" aria-expanded="false"><span class="hide-menu">Calendar</span></a>
                                    </li>
                                </ul> --}}
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                <div class="container-fluid">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
                <footer class="footer t-a-c">
                    © 2020 ZuaCollection
                </footer>
            </div>
        </div>
        <!-- ===== Main-Wrapper-End ===== -->
        <!-- ==============================
            Required JS Files
        =============================== -->
        <script src="{{ asset('template/js/sidebarmenu.js')}}"></script>
        <script src="{{ asset('template/plugins/components/jquery/dist/jquery.min.js')}}"></script>
        <!-- ===== jQuery ===== -->
        <script src="{{ asset('template/plugins/components/jquery/dist/jquery.min.js')}}"></script>
        <!-- ===== Bootstrap JavaScript ===== -->
        <script src="{{ asset('template/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- ===== Slimscroll JavaScript ===== -->
        <script src="{{ asset('template/js/jquery.slimscroll.js')}}"></script>
        <!-- ===== Wave Effects JavaScript ===== -->
        <script src="{{ asset('template/js/waves.js')}}"></script>
        <!-- ===== Menu Plugin JavaScript ===== -->
        <script src="{{ asset('template/js/sidebarmenu.js')}}"></script>
        <!-- ===== Custom JavaScript ===== -->
        <script src="{{ asset('template/js/custom.js')}}"></script>
        <script src="{{ asset('template/js/jasny-bootstrap.js')}}"></script>
        <!-- ===== Plugin JS ===== -->
        <script src="{{ asset('template/plugins/components/chartist-js/dist/chartist.min.js')}}"></script>
        <script src="{{ asset('template/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
        <script src='{{ asset("template/plugins/components/moment/moment.js")}}'></script>
        <script src='{{ asset("template/plugins/components/fullcalendar/fullcalendar.js")}}'></script>
        <script src="{{ asset('template/js/db2.js')}}"></script>
        <script src="{{ asset('template/js/db1.js')}}"></script>
        <script src="{{ asset('template/plugins/components/knob/jquery.knob.js')}}"></script>
        <script src="{{ asset('template/plugins/components/easypiechart/dist/jquery.easypiechart.min.js')}}"></script>
        <script src="{{ asset('template/plugins/components/sparkline/jquery.sparkline.min.js')}}"></script>
        <!-- ===== Style Switcher JS ===== -->
        <script src="{{ asset('template/plugins/components/styleswitcher/jQuery.style.switcher.js')}}"></script>
            
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
              modal.style.display = "block";
              modalImg.src = this.src;
              captionText.innerHTML = this.alt;
            }
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
              modal.style.display = "none";
            }
        </script>
        <script type="text/javascript">
            $(function() {
                $('.icolors li').on("click", function() {
                    $('.icolors li').removeClass('active');
                    $(this).addClass('active');
                });
        
                $('.photos-item').on("click", function() {
                    var src = $(this).children().attr('src');
                    $('#product-image').attr('src', src);
                    $('.photos-item').removeClass('item-active');
                    $(this).addClass('item-active');
                });
            });
        </script>
    </body>
</html>
