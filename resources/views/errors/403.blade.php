@extends('layouts.error')

@section('title')
    403
@endsection
@section('content')
    <h1>403</h1>
    <h4>{{$exception->getMessage()}}</h4>
@endsection