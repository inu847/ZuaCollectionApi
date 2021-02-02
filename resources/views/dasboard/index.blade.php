@extends('layouts.global')

@section('title')
    Dasboard
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    @if (session('statusdel'))
        <div class="alert alert-danger">
            {{session('statusdel')}}
        </div>
    @endif

    @if (session('statusup'))
        <div class="alert alert-warning">
            {{session('statusup')}}
        </div>
    @endif

<div class="alert alert-success">
    {{ ('Welcome ') }}{{ Auth::user()->name }}{{(',')}} {{ __('You are logged in Zua Collection!') }}
</div>
    <div class="row m-0">
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{\App\Models\Baju::count('status')}}</h3>
                    <p class="info-text font-12">Bookings</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">Target<span class="label label-rounded label-success">50</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-comment-text-outline"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">{{$complain}}</h3>
                    <p class="info-text font-12">Complaints</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">Total Pending<span class="label label-rounded label-danger">{{\App\Models\Baju::where('status', 'PROCESS')->count('status')}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box">
            <div class="media">
                <div class="media-left">
                    <span class="icoleaf bg-primary text-white"><i class="mdi mdi-coin"></i></span>
                </div>
                <div class="media-body">
                    <h3 class="info-count text-blue">&#36;{{\App\Models\Baju::sum('invoice')}}</h3>
                    <p class="info-text font-12">Earning</p>
                    <span class="hr-line"></span>
                    <p class="info-ot font-15">{{now()->format('F')}} : <span class="text-blue font-semibold">&#36;{{\App\Models\Baju::sum('invoice')}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 info-box b-r-0">
            <div class="media">
                <div class="media-left p-r-5">
                        <div id="earning" class="e" data-percent="{{$hasil}}">
                        <div id="pending" class="p" data-percent="{{$hasilProses}}"></div>
                        <div id="booking" class="b" data-percent="{{$hasilBooking}}"></div>
                    </div>
                </div>
                <div class="media-body">
                    <h2 class="text-blue font-22 m-t-0">Report</h2>
                    <ul class="p-0 m-b-20">
                        <li><i class="fa fa-circle m-r-5 text-primary"></i>{{$hasil}}{{'%'}}{{' Earning'}}</li>
                        <li><i class="fa fa-circle m-r-5 text-primary"></i>{{$hasilProses}}{{'%'}}{{' Pending'}}</li>
                        <li><i class="fa fa-circle m-r-5 text-info"></i>{{$hasilBooking}}{{'%'}} {{'Bookings'}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ===== Page-Container ===== -->
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="white-box stat-widget">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <h4 class="box-title">Statistics</h4>
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <select class="custom-select">
                                <option selected value="0">Feb 04 - Mar 03</option>
                                <option value="1">Mar 04 - Apr 03</option>
                                <option value="2">Apr 04 - May 03</option>
                                <option value="3">May 04 - Jun 03</option>
                            </select>
                            <ul class="list-inline">
                                <li>
                                    <h6 class="font-15"><i class="fa fa-circle m-r-5 text-success"></i>New Sales</h6>
                                </li>
                                <li>
                                    <h6 class="font-15"><i class="fa fa-circle m-r-5 text-primary"></i>Existing Sales</h6>
                                </li>
                            </ul>
                        </div>
                        <div class="stat chart-pos"></div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="col-md-4 col-sm-12">
                <div class="white-box">
                    <h4 class="box-title">Task Progress</h4>
                    <div class="task-widget t-a-c">
                        <div class="task-chart" id="sparklinedashdb"></div>
                        <div class="task-content font-16 t-a-c">
                            <div class="col-sm-6 b-r">
                                Urgent Tasks
                                <h1 class="text-primary">05 <span class="font-16 text-muted">Tasks</span></h1>
                            </div>
                            <div class="col-sm-6">
                                Normal Tasks
                                <h1 class="text-primary">03 <span class="font-16 text-muted">Tasks</span></h1>
                            </div>
                        </div>
                        <div class="task-assign font-16">
                            Assigned To
                            <ul class="list-inline">
                                <li class="p-l-0">
                                    <img src="{{ asset('template/plugins/images/users/1.png')}}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                </li>
                                <li>
                                    <img src="{{ asset('template/plugins/images/users/2.png')}}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                </li>
                                <li>
                                    <img src="{{ asset('template/plugins/images/users/3.png')}}" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave">
                                </li>
                                <li class="p-r-0">
                                    <a href="javascript:void(0);" class="btn btn-success font-16">3+</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="white-box bg-primary color-box">
                    <h1 class="text-white font-light">&#36;6547 <span class="font-14">Revenue</span></h1>
                    <div class="ct-revenue chart-pos"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="white-box bg-success color-box">
                    <h1 class="text-white font-light m-b-0">5247</h1>
                    <span class="hr-line"></span>
                    <p class="cb-text">current visits</p>
                    <h6 class="text-white font-semibold">+25% <span class="font-light">Last Week</span></h6>
                    <div class="chart">
                        <div class="ct-visit chart-pos"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="white-box bg-danger color-box">
                    <h1 class="text-white font-light m-b-0">25%</h1>
                    <span class="hr-line"></span>
                    <p class="cb-text">Finished Tasks</p>
                    <h6 class="text-white font-semibold">+15% <span class="font-light">Last Week</span></h6>
                    <div class="chart">
                        <input class="knob" data-min="0" data-max="100" data-bgColor="#f86b4a" data-fgColor="#ffffff" data-displayInput=false data-width="96" data-height="96" data-thickness=".1" value="25" readonly>
                    </div>
                </div>
            </div>
        </div> --}}
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box user-table">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="box-title">User Data</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Join At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if( $user->roles == 'ADMIN')
                                            <span class="label label-success">{{ $user->roles }}</span>
                                        @elseif( $user->roles == 'MEMBER')
                                            <span class="label label-info">{{ $user->roles }}</span>
                                        @else
                                            <span class="label label-danger">{{ $user->roles }}</span>
                                        @endif
                                    </td>
                                    <td><i class="fa fa-clock-o"></i> {{ $user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form
                                            onsubmit="return confirm('Delete this user permanently?')"
                                            class="d-inline"
                                            action="{{route('user.destroy', [$user->id])}}"
                                            method="POST">
                                            @csrf

                                        <a class="btn btn-success" href="{{route('user.edit', [$user->id])}}"><i class="fa fa-pencil"></i></a>

                                        <input
                                            type="hidden"
                                            name="_method"
                                            value="DELETE">
                                        <button type="submit"
                                                value="Delete" 
                                                class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="task-add-btn text-right">
                        <a href="{{ route('user.create')}}" class="btn btn-warning">+</a>
                    </div>
                    {{-- <ul class="pagination">
                        <li class="disabled"> <a href="#">1</a> </li>
                        <li class="active"> <a href="#">2</a> </li>
                        <li> <a href="#">3</a> </li>
                        <li> <a href="#">4</a> </li>
                        <li> <a href="#">5</a> </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <div class="task-widget2">
                        <div class="task-image">
                            <img src="{{ asset('template/plugins/images/task.jpg')}}" alt="task" class="img-responsive">
                            <div class="task-image-overlay"></div>
                            <div class="task-detail">
                            <h2 class="font-light text-white m-b-0">{{now()->format('l, d F Y')}}</h2>
                                <h4 class="font-normal text-white m-t-5">Complain in today</h4>
                            </div>
                        </div>
                        <div class="task-total">
                            <p class="font-16 m-b-0"><strong>{{$complain}}</strong> Complain <a href="javascript:void(0);" class="text-link">This Year</a></p>
                        </div>
                        <div class="task-list">
                            <ul class="list-group">
                                @foreach ($suggestion as $suggest)
                                    <li class="list-group-item bl-info">
                                        
                                        <div class="checkbox checkbox-success">
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <a href="{{ route('suggestion.show', [$suggest->id])}}"><p class="p-l-30 font-bold">{{$suggest->name}}</p></a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="https://wa.me/{{$suggest->phone}}" class="label label-table label-warning font-20"><span class="fa fa-whatsapp"></span></a>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-11">
                                                    <input id="c7" type="checkbox" name="checkbox">
                                                    <label for="c7">
                                                        <span class="font-16">{{$suggest->suggestion}}</span>
                                                    </label>
                                                </div>
                                                <div class="col-md-1 p-t-10">
                                                    <a href="{{ route('suggestion.show', [$suggest->id])}}" class="label label-table label-info font-20"><span class="fa fa-list"></span></a>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-11">
                                                    <h6 class="p-l-30 font-bold">{{$suggest->created_at->format('h:i:s')}} PM</h6>
                                                </div>
                                                <div class="col-md-1 p-t-20">
                                                    <form onsubmit="return confirm('Delete this order permanently?')"
                                                          class="d-inline"
                                                          action="{{route('suggestion.destroy', [$suggest->id])}}"
                                                          method="POST">
                                                    @csrf
                                                    <input type="hidden"
                                                           name="_method"
                                                           value="DELETE">
                                                    <button value="Delete" type="submit" class="label label-table label-danger font-20"><span class="fa fa-trash"></span></button>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="task-loadmore">
                            <a href="{{ route('suggestion.index')}}" class="btn btn-default btn-outline btn-rounded">Load More</a>
                        </div>
                    </div>
                </div>
            </div>




@endsection