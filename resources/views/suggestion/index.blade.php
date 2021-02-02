@extends('layouts.global')

@section('title')
    List Suggestion
@endsection

@section('content')
    @foreach ($suggestions as $suggest)
        <div class="white-box">
            <div class="row">
                <div class="col-md-10">
                    <h3>                        
                        {{$suggest->name}}
                        @if ($suggest->rating=='BAIK')
                            <span class="label label-table label-success font-10 m-l-5">{{$suggest->rating}}</span><br>
                        @elseif ($suggest->rating=='KURANG')
                            <span class="label label-table label-info font-10 m-l-5">{{$suggest->rating}}</span><br>
                        @elseif ($suggest->rating=='BURUK')
                            <span class="label label-table label-danger font-10 m-l-5">{{$suggest->rating}}</span><br>
                        @endif
                        <span class="text-muted font-15"> {{$suggest->created_at->diffForHumans()}}</span>
                    </h3>
                    <div>
                        <p>{{$suggest->suggestion}}</p>
                    </div>
                </div>
                <div class="col-md-2 m-t-40">
                    <a href="https://wa.me/{{$suggest->phone}}" class="label label-table label-warning font-15"><span class="fa fa-whatsapp"></span> WhatsApp</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection