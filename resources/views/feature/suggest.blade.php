@extends('layouts.auth')

@section('title')
    Suggestion
@endsection

@section('content')
<form action="" class="form-horizontal form-material" id="loginform" method="POST">
    <div class="form-group">
        <div class="col-xs-12 sm-8">
            <label for="">Nama :</label>
                <input type="text">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 sm-8">
            <label for="">Suggestion :</label>
            <div class="text-center">
                <textarea name="" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
</form>
    
@endsection
