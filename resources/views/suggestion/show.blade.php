@extends('layouts.global')

@section('title')
    Detail Suggestion
@endsection

@section('content')
<div class="white-box">
    <div class="row">
        <div class="col-md-10">
            <h3>                        
                {{$rating->name}}
                @if ($rating->rating=='BAIK')
                    <span class="label label-table label-success font-10 m-l-5">{{$rating->rating}}</span><br>
                @elseif ($rating->rating=='KURANG')
                    <span class="label label-table label-info font-10 m-l-5">{{$rating->rating}}</span><br>
                @elseif ($rating->rating=='BURUK')
                    <span class="label label-table label-danger font-10 m-l-5">{{$rating->rating}}</span><br>
                @endif
                <span class="text-muted font-15"> {{$rating->created_at->diffForHumans()}}</span>
            </h3>
            <div>
                <p>{{$rating->suggestion}}</p>
            </div>
        </div>
        <div class="col-md-2 m-t-40">
            <a href="https://wa.me/{{$rating->phone}}" class="label label-table label-warning font-15"><span class="fa fa-whatsapp"></span> WhatsApp</a>
        </div>
    </div>
</div>
@endsection