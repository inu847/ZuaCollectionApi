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

@foreach ($product as $prod)
    <div class="row">
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
@endforeach
        {{-- <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/2.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/1.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">Batik amazing from jogja</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/3.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/4.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/4.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/5.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/5.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/7.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/6.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/1.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/7.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/3.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/8.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/4.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/9.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/6.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/10.jpg')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/9.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/11.png')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/1.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <div class="container">
                        <img class="place-self-center image" src="{{ asset('template/plugins/images/12.png')}}" class="img-responsive" />
                        <div class="overlay">
                            <img class="text " src="{{ asset('template/plugins/images/10.jpg')}}" class="img-responsive" />
                        </div>
                    </div>
                </div>
                <div class="product-text">
                    <h3 class="box-title m-b-0">Batik Jogja</h3>
                    <small class="text-muted db">This elegant african suit for men</small>
                    <a href="{{ route('galeri.create')}}" class="pro-dis bg-danger">Buy <br> Now</a>
                    <h3 class="pro-price m-b-0">&#36;72
                        <span class="old-price">&#36;100</span>
                    </h3>
                </div>
            </div>
        </div>
    </div> --}}
@endsection