@extends('layouts.global')

@section('title')
    Checkout
@endsection

@section('content')
<form 
    enctype="multipart/form-data"
    action="{{ route('listorder.pesanan', [$product->id])}}"
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
                                {{-- <div class="row">
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
                                </div> --}}
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="first_name">First Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{$product->first_name}}" type="text" class="form-control {{$errors->first('first_name') ? "is-invalid": ""}}" id="first_name" placeholder="First Name" name="first_name"> 
                                                <span class="help-block">{{$errors->first('first_name')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="last_name">Last Name</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{$product->last_name}}" type="text" class="form-control {{$errors->first('last_name') ? "is-invalid": ""}}" id="last_name" placeholder="Last Name" name="last_name"> 
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
                                                    <option value="{{$product->gender}}">{{$product->gender}}</option>
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
                                                <input value="{{$product->birth}}" type="date" class="form-control {{$errors->first('birth') ? "is-invalid": ""}}" id="birth" placeholder="dd/mm/yyyy" name="birth"> 
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
                                            <label class="control-label col-md-3 p-t-10" for="price">Count Price</label>
                                            <div class="col-md-9 m-b-10">
                                                <input value="{{$product->price}}" type="text" class="form-control {{$errors->first('price') ? "is-invalid": ""}}" id="price" placeholder="Many Price" name="price"> 
                                                <span class="help-block">{{$errors->first('price')}}</span>
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
                                            <label class="control-label col-md-3 m-t-10" for="address1">Address 1</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{$product->address1}}" type="text" class="form-control {{$errors->first('address1') ? "is-invalid": ""}}" id="address1" placeholder="Take Your Address Here" name="address1"> 
                                                    <span class="help-block">{{$errors->first('address1')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 m-t-10" for="address2">Address 2</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{$product->address2}}" type="text" class="form-control {{$errors->first('address2') ? "is-invalid": ""}}" id="address2" placeholder="Take Your Another Address" name="address2"> 
                                                    <span class="help-block">{{$errors->first('address2')}}</span> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="city">City</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{$product->city}}" type="text" class="form-control {{$errors->first('city') ? "is-invalid": ""}}" id="city" placeholder="Take Your City" name="city"> 
                                                    <span class="help-block">{{$errors->first('city')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 p-t-10" for="state">State</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{$product->state}}" type="text" class="form-control {{$errors->first('state') ? "is-invalid": ""}}" id="state" placeholder="Take Your State" name="state"> 
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
                                                <input value="{{$product->post_code}}" type="text" class="form-control {{$errors->first('post_code') ? "is-invalid": ""}}" id="post_code" placeholder="Take Your Post Code" name="post_code"> 
                                                <span class="help-block">{{$errors->first('post_code')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 p-t-10" for="country">Country</label>
                                                <div class="col-md-9 m-b-10">
                                                    <input value="{{$product->country}}" type="text" class="form-control {{$errors->first('country') ? "is-invalid": ""}}" id="country" placeholder="Take Your Country" name="country"> 
                                                    {{-- <input value="{{$product->tampak_depan}}" type="hidden" class="form-control {{$errors->first('avatar') ? "is-invalid": ""}}" id="avatar" name="avatar">  --}}
                                                    <span class="help-block">{{$errors->first('country')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3 p-t-10">Status</label>
                                                <div class="col-md-9 m-b-10">
                                                    <select  class="form-control {{$errors->first('status') ? "is-invalid" : "" }}" name="status">
                                                        <option value="{{$product->status}}">{{$product->status}}</option>
                                                        <option id="DIKIRIM" value="DIKIRIM">Dikirim</option>
                                                        <option id="SELESAI" value="SELESAI">Selesai</option>
                                                    </select> 
                                                    <span class="help-block">{{$errors->first('status')}}</span> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 m-t-10">
                                            <div class="row">
                                                <div class="col-md-offset-8">
                                                    <input type="submit" class="btn btn-success text-white" value="Submit">
                                                    <a type="button" class="btn btn-default" href="{{route('galeri.index')}}">Cancel</a>
                                                </div>
                                                </div>                                          
                                        </div>
                                    </div>
                                    <!--/span-->
                                <!--/row-->
                            </div>
                            {{-- <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection