<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Scraping</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Zua Collection Scrapper</title>

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
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-8">
                        <table class="table table-responsive table-hover table-stripped p-t-5">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Jenis</th>
                                    <th>invoice</th>
                                    <th>Success_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($scraping as $page)
                                    <tr>
                                        <td>{{$page->title}}</td>
                                        <td>{{$page->kategori}}</td>
                                        <td>{{$page->invoice}}</td>
                                        <td><i class="fa fa-clock-o"></i> {{$page->updated_at}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
