@extends('layouts.global')

@section('title')
    Checkout
@endsection

@section('content')

            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Create New Product</h3>
                        <p class="text-muted m-b-30 font-13"> Upload your product to publish </p>
                        <form
                            action="{{route('pages.update', [$pages->id])}}"
                            enctype="multipart/form-data"
                            method="POST"
                            class="form-horizontal"
                            >
                            @csrf
                            <input
                            type="hidden"
                            value="PUT"
                            name="_method">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="col-md-12">Product Name</label>
                                        <div class="col-md-12 m-b-5">
                                            <input type="text" class="form-control {{$errors->first('product_name') ? "is-invalid": ""}}" value="{{$pages->product_name}}" id="nama" name="product_name" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-md-12">Size</label>
                                        @foreach (json_decode($pages->size) as $size)
                                            
                                        
                                        <div class="col-md-3 m-b-5">
                                            <select name="size[]" id="" class="form-control">
                                                @if ($size =='X')
                                                    <option value="X">X</option>
                                                    <option>None</option>
                                                @elseif($size =='M')
                                                    <option value="M">M</option>
                                                    <option>None</option>
                                                @elseif($size =='L')
                                                    <option value="L">L</option>
                                                    <option>None</option>
                                                @elseif($size =='XL'))
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="XXXL">XXXL</option>
                                                    <option>None</option>
                                                @elseif($size =='XXL')  
                                                    <option value="XXL">XXL</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXXL">XXXL</option>
                                                    <option>None</option>
                                                @elseif($size =='XXXL')
                                                    <option value="XXXL">XXXL</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option>None</option>
                                                {{-- None --}}
                                                @elseif ($size !='X')
                                                    <option>None</option>
                                                    <option value="X">X</option>
                                                @elseif($size !='M')
                                                    <option>None</option>
                                                    <option value="X">M</option>
                                                @elseif($size !='L')
                                                    <option>None</option>
                                                    <option value="X">L</option>
                                                @elseif($size !='XL')
                                                    <option>None</option>
                                                    <option value="XL">XL</option>
                                                @endif
                                            </select>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <div class="invalid-feedback p-l-15">
                                    {{$errors->first('product_name')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Descriptions</label>
                                <div class="col-md-12">
                                    <textarea class="form-control {{$errors->first('deskripsi') ? "is-invalid": ""}}" id="nama" name="deskripsi">{{$pages->deskripsi}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Gambar Tampak Depan</label>
                                <div class="col-sm-12">
                                    @if($pages->tampak_depan)
                                            <img src="{{asset('storage/'.$pages->tampak_depan)}}" width="120px" />
                                        <br>
                                        @else
                                            No avatar
                                        @endif
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                        <input type="file" class="{{$errors->first('tampak_depan') ? "is-invalid": ""}}" id="tampak_depan" name="tampak_depan"> 
                                        </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                    </div>
                                    <div class="invalid-feedback">
                                        {{$errors->first('tampak_depan')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Gambar Tampak Belakang</label>
                                <div class="col-sm-12">
                                    @if($pages->tampak_belakang)
                                            <img src="{{asset('storage/'.$pages->tampak_belakang)}}" width="120px" />
                                        <br>
                                        @else
                                            No avatar
                                        @endif
                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> 
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i> 
                                            <span class="fileinput-filename"></span>
                                        </div> 
                                        <span class="input-group-addon btn btn-default btn-file"> 
                                            <span class="fileinput-new">Select file</span> 
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" class="{{$errors->first('tampak_belakang') ? "is-invalid": ""}}" id="tampak_belakang" name="tampak_belakang">
                                        </span> 
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                    </div>
                                    <div class="invalid-feedback">
                                        {{$errors->first('tampak_belakang')}}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Price</label>
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp. </div>
                                        <input type="text" class="form-control {{$errors->first('price') ? "is-invalid": ""}}" value="{{$pages->price}}" id="nama" name="price"> 
                                    </div>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                {{$errors->first('price')}}
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox33" type="checkbox" required>
                                        <label for="checkbox33">Check me out !</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-t-10" value="save">Publish</button>
                                    <a href="{{ route('pages.index')}}" type="submit" class="btn btn-danger waves-effect waves-light m-t-10">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection