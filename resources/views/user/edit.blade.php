@extends('layouts.auth')

@section('title')
    Edit User
@endsection
@section('content')
    <form action="{{route('user.update', [$user->id])}}" 
        enctype="multipart/form-data" 
        class="form-horizontal form-material" 
        method="POST">
        @csrf
        
        <input
        type="hidden"
        value="PUT"
        name="_method">
        
        <h3 class="box-title">Update User</h3>
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" id="name" type="text" value="{{$user->name}}" name="name">
            </div>
        </div>
        <div class="invalid-feedback">
            {{$errors->first('name')}}
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                {{$user->email}}
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <select class="form-control {{$errors->first('kategori') ? "is-invalid" : "" }}" name="roles">
                    <option value="{{$user->roles}}">{{$user->roles}}</option>
                    <option value="ADMIN">Admin</option>
                    <option value="MEMBER">Member</option>
                    <option value="CUSTOMER">Customer</option>
                </select>
            </div>
        </div>
        <div class="invalid-feedback">
            {{$errors->first('roles')}}
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" id="phone" type="text" value="{{$user->phone}}" name="phone">
            </div>
        </div>
        <div class="invalid-feedback">
            {{$errors->first('phone')}}
        </div>

        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" id="address" type="text" value="{{$user->address}}" name="address">
            </div>
        </div>
        <div class="invalid-feedback">
            {{$errors->first('address')}}
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <div class="checkbox checkbox-primary p-t-0">
                    <input id="checkbox-signup" type="checkbox">
                    <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                </div>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button value="Save" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
            </div>
        </div>
    </form>
@endsection
                
            