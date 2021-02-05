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
                            <div class="form-body">
                                <h3 class="box-title">Person Info</h3>
                                <hr class="m-t-0 m-b-20">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="white-box p-10">
                                                @if ($product->tampak_depan)
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <img src="{{ asset('storage/'. $product->tampak_depan)}}" alt="" width="70px" height="80px">
                                                        </div>
                                                        <div class="p-10">
                                                            <span class="h5"><strong>{{Str::limit($product->product_name,100)}}</strong></span>
                                                            <div><span>{{Str::limit($product->deskripsi, 100)}}</span></div>
                                                            <div><span><strong>Rp.{{$product->price}}</strong></span></div>
                                                        </div>
                                                    </div>       
                                                @else
                                                    No Images
                                                @endif      
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="first_name">First Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{old('first_name')}}" type="text" class="form-control {{$errors->first('first_name') ? "is-invalid": ""}}" id="first_name" placeholder="First Name" name="first_name"> 
                                                <span class="help-block">{{$errors->first('first_name')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="last_name">Last Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{old('last_name')}}" type="text" class="form-control {{$errors->first('last_name') ? "is-invalid": ""}}" id="last_name" placeholder="Last Name" name="last_name"> 
                                                <span class="help-block">{{$errors->first('last_name')}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10">Gender</label>
                                            <div class="col-md-9 m-b-10">
                                                <select  class="form-control {{$errors->first('gender') ? "is-invalid" : "" }}" name="gender">
                                                    <option id="Male" value="Male">Male</option>
                                                    <option id="Female" value="Female">Female</option>
                                                </select> 
                                                <span class="help-block">{{$errors->first('name')}}</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="birth">Date of Birth</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{old('birth')}}" type="date" class="form-control {{$errors->first('birth') ? "is-invalid": ""}}" id="birth" placeholder="dd/mm/yyyy" name="birth"> 
                                                <span class="help-block">{{$errors->first('birth')}}</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="product_name">Product Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{$product->product_name}}" type="text" class="form-control {{$errors->first('product_name') ? "is-invalid": ""}}" id="product_name" placeholder="{{$product->product_name}}" name="product_name" readonly> 
                                                <span class="help-block">{{$errors->first('product_name')}}</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label class="control-label col-md-4 p-t-10 m-r-20" for="price">Count Price</label>
                                                    <div class="col-md-7 m-b-10">
                                                        <input value="{{old('price')}}" type="text" class="form-control {{$errors->first('price') ? "is-invalid": ""}}" id="price" placeholder="Many Price" name="price"> 
                                                        <span class="help-block">{{$errors->first('price')}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="size" class="col-md-4 m-t-10">Size</label>
                                                    <div class="col-md-8">
                                                        <select name="size" id="size" class="form-control">
                                                            @foreach (json_decode($product->size) as $size)
                                                                @if ($size!='None'))
                                                                    <option value="{{$size}}">{{$size}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
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
                                            <label class="control-label col-md-3 m-t-10" for="address">Address</label>
                                                <div class="col-md-5 m-b-10">
                                                    <input value="{{old('address')}}" type="text" class="form-control {{$errors->first('address') ? "is-invalid": ""}}" id="address" placeholder="Take Your Address Here" name="address"> 
                                                    <span class="help-block">{{$errors->first('address')}}</span>
                                                </div>
                                                <div class="col-md-2 m-b-10">
                                                    <input value="{{old('rt')}}" type="text" class="form-control {{$errors->first('rt') ? "is-invalid": ""}}" id="rt" placeholder="RT" name="rt"> 
                                                </div>                
                                                    
                                                <div class="col-md-2">
                                                    <input value="{{old('rw')}}" type="text" class="form-control {{$errors->first('rw') ? "is-invalid": ""}}" id="rw" placeholder="RW" name="rw"> 
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="phone">Phone</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input type="hidden" name="pho" value="+62">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">+62 </div>
                                                        <input value="{{old('ne')}}" type="number" class="form-control {{$errors->first('ne') ? "is-invalid": ""}}" id="ne" placeholder="Take Your Another Address" name="ne">
                                                        <span class="help-block">{{$errors->first('ne')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="city">City</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{old('city')}}" type="text" class="form-control {{$errors->first('city') ? "is-invalid": ""}}" id="city" placeholder="Take Your City" name="city"> 
                                                    <span class="help-block">{{$errors->first('city')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 p-t-10" for="state">State</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{old('state')}}" type="text" class="form-control {{$errors->first('state') ? "is-invalid": ""}}" id="state" placeholder="Take Your State" name="state"> 
                                                    <span class="help-block">{{$errors->first('state')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="post_code">Post Code</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{old('post_code')}}" type="text" class="form-control {{$errors->first('post_code') ? "is-invalid": ""}}" id="post_code" placeholder="Take Your Post Code" name="post_code"> 
                                                <span class="help-block">{{$errors->first('post_code')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="country">Country</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{old('country')}}" type="text" class="form-control {{$errors->first('country') ? "is-invalid": ""}}" id="country" placeholder="Take Your Country" name="country"> 
                                                    {{-- <input value="{{$product->tampak_depan}}" type="hidden" class="form-control {{$errors->first('avatar') ? "is-invalid": ""}}" id="avatar" name="avatar">  --}}
                                                    <span class="help-block">{{$errors->first('country')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" class="form-control" value="{{$product->price}}" name="product">
                                        <input type="hidden" class="form-control" value="PENDING" name="status">
                                    </div>
                                    <!--/span-->
                                <!--/row-->
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-offset-10 col-md-9">
                                                <button type="submit" class="btn btn-success text-white" value="Submit">Submit</button>
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