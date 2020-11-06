<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Zua Collection @yield("title")</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cubic Admin Template</title>
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
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
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
                                <span class="badge badge-xs badge-danger">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div>
                                            <p>
                                                <strong>Task 1</strong>
                                                <span class="pull-right text-muted">40% Complete</span>
                                            </p>
                                            <div class="progress progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                                <a class="waves-effect" href="" aria-expanded="false">
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
    </body>
</html>
