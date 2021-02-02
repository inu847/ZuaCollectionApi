@extends('layouts.global')

@section('title')
    Detail Suggestion
@endsection

@section('content')
    <div class="white-box">
        <div class="row">
            <div class="col-md-12">
                {{$rating->name}}
            </div>
        </div>
    </div>
@endsection