@extends('layouts.global')

@section('title')
    Checkout
@endsection

@section('content')
<form 
    enctype="multipart/form-data"
    action="{{route('galeri.store')}}"
    method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Checkout Order</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="box-title">Person Info</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10">First Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input type="text" class="form-control" placeholder="First Name"> 
                                                <span class="help-block">{{$errors->first('name')}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10">Last Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input type="text" class="form-control" placeholder="Last Name"> 
                                                <span class="help-block">{{$errors->first('name')}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender</label>
                                            <div class="col-md-9 m-b-10">
                                                <select class="form-control">
                                                    <option value="">Male</option>
                                                    <option value="">Female</option>
                                                </select> 
                                                <span class="help-block">{{$errors->first('name')}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Date of Birth</label>
                                            <div class="col-md-9 m-b-10">
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                                                <span class="help-block">{{$errors->first('name')}}</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Kategori</label>
                                            <div class="col-md-9 m-b-10">
                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Category 1">Atasan</option>
                                                    <option value="Category 2">Bawahan</option>
                                                    <option value="Category 3">Full Dress</option>
                                                    <option value="Category 4">Couple</option>
                                                </select>
                                                <span class="help-block">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Count Price</label>
                                            <div class="col-md-9 m-b-10">
                                                <input type="number" class="form-control" placeholder="Many Price">
                                                <span class="help-block">{{$errors->first('name')}}</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <h3 class="box-title">Address</h3>
                                <hr class="m-t-0 m-b-40">
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10">Address 1</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="text" class="form-control" placeholder="Take Your Address Here"> 
                                                    <span class="help-block">{{$errors->first('name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10">Address 2</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="text" class="form-control" placeholder="Take Your Another Address">
                                                    <span class="help-block">{{$errors->first('name')}}</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="text" class="form-control" placeholder="Take Your City"> 
                                                    <span class="help-block">{{$errors->first('name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">State</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="text" class="form-control" placeholder="Take Your State">
                                                    <span class="help-block">{{$errors->first('name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Post Code</label>
                                            <div class="col-md-9 m-b-10">
                                                <input type="text" class="form-control" placeholder="Take Your Post Code"> 
                                                <span class="help-block">{{$errors->first('name')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Country</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="text" class="form-control" placeholder="Take Your Country"> 
                                                    <span class="help-block">{{$errors->first('name')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                <!--/row-->
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-offset-10 col-md-9">
                                                <a type="submit" class="btn btn-success text-white" href='#'>Submit</a>
                                                <a type="button" class="btn btn-default" href="{{route('galeri.index')}}">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection