@extends('layouts.auth')      

@section('title')
    Add New User
@endsection

@section('content')
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <form action="{{route('user.store')}}" 
                    enctype="multipart/form-data" 
                    class="form-horizontal form-material" 
                    method="POST">
                    @csrf
                
                    <h3 class="box-title">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" value="{{ old('name')}}" placeholder="Name" name="name">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" value="{{ old('email')}}" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('email')}}
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <select class="form-control {{$errors->first('kategori') ? "is-invalid" : "" }}" name="roles">
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
                            <input class="form-control" type="number" value="{{ old('phone')}}" placeholder="Phone Number" name="phone">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('phone')}}
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" value="{{ old('address')}}" placeholder="Address" name="address">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('address')}}
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('password')}}
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        {{$errors->first('password')}}
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox" required>
                                <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                        </div>
                    </div>
                </form>
@endsection