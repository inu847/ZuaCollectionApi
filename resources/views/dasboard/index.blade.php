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

{{-- <div class="alert alert-success">
    {{ ('Welcome ') }}{{ Auth::user()->name }}{{(',')}} {{ __('You are logged in Zua Collection!') }}
</div> --}}
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
                        <a href="{{ route('user.index')}}" class="btn btn-info"><i class="fa fa-list"></i></a>
                    </div>
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
                                                @if ($suggest->phone!='+62')
                                                    <div class="col-md-1">
                                                        <a href="https://wa.me/{{$suggest->phone}}" class="label label-table label-warning font-20"><span class="fa fa-whatsapp"></span></a>
                                                    </div>
                                                @else
                                                    <div class="col-md-1">
                                                        <a class="label label-table label-success font-20"><span class="fa fa-ban"></span></a>
                                                    </div>
                                                @endif
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
                                                    <h6 class="p-l-30 font-bold">{{$suggest->created_at}}</h6>
                                                </div>
                                                <div class="col-md-1 p-t-10">
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