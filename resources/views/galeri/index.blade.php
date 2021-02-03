@extends('layouts.global')

@section('title')
    Galeri
@endsection

@section('judul')
    <div class="text-center ">
        <div class="text-blue-600">
            <h1>Order Now</h1>
        </div>
    </div>
@endsection

@section('content')
@if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
<div class="col-sm-12">
    <div class="white-box">
        <thead>
        <div class="row">
            <div class="col-md-4">
                <h3 class="box-title m-b-5">Welcome in Zua collection</h3>
                <p class="text-muted m-b-30">Selamat berbelanja di zua collection. Happy shopping</p>
            </div>               
                <form action="{{ route('galeri.index')}}">
                    <div class="col-md-4 m-t-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Filter Berdasarkan Nama Product">
                            <div class="input-group-addon text-blue">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 m-t-10">
                        <select name="price" id="" class="form-control">
                            <option value=""> Filter Harga</option>
                            <option value="99000"> {{'<'}}Rp.100.000</option>
                            <option value="100000"> {{'>'}}Rp.100.000</option>
                            <option value="200000"> {{'>'}}Rp.200.000</option>
                            <option value="500000"> {{'>'}}Rp.500.000</option>
                            <option value="1000000"> {{'>'}}Rp.1.000.000</option>
                        </select>
                    </div>
                    <div class="col-md-1 m-b-30 m-t-10">
                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i> Submit</button>
                    </div>
                </form>
        </div>
    </thead>
        <tbody>
        <div class="row">
            @foreach ($product as $prod)
            <a href="{{ route('galeri.show', [$prod->id])}}">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <div class="product-img">
                            <div class="container">
                                @if($prod->tampak_depan)
                               
                                    <img class="place-self-center image" src="{{asset('storage/'. $prod->tampak_depan)}}" class="img-responsive" />
                                 
                                @else
                                    No avatar
                                    @endif </td>
                                <div class="overlay">
                                    @if($prod->tampak_belakang)
                                    <img class="text " src="{{asset('storage/'. $prod->tampak_belakang)}}" class="img-responsive" />
                                    @else
                                    No avatar
                                    @endif </td>
                                </div>
                            </div>
                        
                        </div>
                        <div class="product-text">
                            <h3 class="box-title m-b-0">{{Str::limit($prod->product_name,25)}}</h3>
                            <small class="text-muted db">{{Str::limit($prod->deskripsi,40)}}</small>
                            <a href="{{ route('galeri.edit', [$prod->id])}}" class="pro-dis bg-danger">Buy <br> Now</a>
                            <h3 class="pro-price m-b-0">Rp{{$prod->price}}
                            <span class="old-price">Rp{{$prod->price+20000}}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        </tbody>
        <tfoot>
            <div class="row">
                <div class="col-md-5">
                    
                </div>
                <div class="col-md-5">
                    <tr class="text-right">
                        <td colspan=10>
                            {{$product->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </div>
            </div>
        </tfoot>
    </div>
</div>

<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title">Rating Us</h3>
        <hr>
        <form action="{{route('suggestion.store')}}"
              class="d-inline"
              method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    {{-- row --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-12">Name</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-12">Phone Number</label>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">+62 </div>
                                        <input type="hidden" class="form-control" name="pho" value="+62">
                                        <input type="number" class="form-control" name="ne">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- row --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-md-12 m-t-10">Suggestion</label>
                                <div class="col-md-12">
                                    <textarea id="" cols="77" rows="3" name="suggestion"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 m-15">
                                        <label for="">Rating</label>
                                        <select name="rating" id="" class="form-control">
                                            <option value="BAIK">Baik</option>
                                            <option value="KURANG">Kurang Baik</option>
                                            <option value="BURUK">Buruk</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 m-t-40">
                                        <div class="col-md-offset-7 m-t-20">
                                            <button class="btn btn-danger" type="submit" value="save">Submit</button>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        
                    </div>  
                </div>
            </div>
        </form> 
    </div>
</div>
@endsection