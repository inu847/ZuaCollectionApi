@extends('layouts.error')

@section('title')
    401
@endsection
@section('content')
    <h1>401</h1>
    <h4>{{$exception->getMessage()}}</h4>
@endsection