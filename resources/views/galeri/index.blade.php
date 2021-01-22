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

<div class="col-sm-12">
    <div class="white-box">
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
                            <h3 class="box-title m-b-0">{{$prod->product_name}}</h3>
                            <small class="text-muted db">{{$prod->deskripsi}}</small>
                            <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                            <h3 class="pro-price m-b-0">Rp{{$prod->price}}
                            <span class="old-price">Rp{{$prod->price+20000}}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection