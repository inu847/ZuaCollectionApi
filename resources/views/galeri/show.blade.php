@extends('layouts.global')

@section('title')
    Detail Product
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">                        
                    
                    <h4 class="box-title">Product Details</h4>
                    <hr>
                    @if($galeri->tampak_depan)

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="white-box text-center">
                                <img src="{{asset('storage/'. $galeri->tampak_depan)}}" id="product-image" class="img-responsive" />
                            </div>
                            <div class="pro-photos">
                                <div class="photos-item item-active">
                                    <img src="{{asset('storage/'. $galeri->tampak_depan)}}">
                                </div>
                                @else
                                    No avatar
                                @endif
                                @if($galeri->tampak_belakang)
                                    <div class="photos-item">
                                        <img src="{{asset('storage/'. $galeri->tampak_belakang)}}">
                                    </div>
                                @else
                                    No avatar
                                @endif
                            </div>
                            <div class="clear"></div>
                        </div>
                                 
                    
                    
                        <div class="col-md-8 col-sm-6">
                            <h4 class="box-title m-t-0">{{$galeri->product_name}}</h4>
                            <h2 class="pro-price m-b-0 m-t-20">Rp.{{$galeri->price}}
                                    <span class="old-price">Rp.{{$galeri->price+20000}}</span>
                                    <span class="text-danger">10% off</span>
                                </h2>
                            <hr>
                            <p>{{$galeri->deskripsi}}</p>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h6 class="m-t-20">Available Size</h6>
                                    <p>
                                        @foreach (json_decode($galeri->size) as $role)
                                            @if ($role!='None')
                                                <span class="label label-rounded label-default text-dark">{{$role}}</span>
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <a class="btn btn-danger m-r-5" href="{{ route('galeri.edit', [$galeri->id])}}"> Buy Now </a>
                            <button class="btn btn-primary m-r-5"><i class="ti-shopping-cart"></i> Add to Cart</button>
                            <h3 class="box-title m-t-40">Key Highlights</h3>
                            <ul class="list-icons">
                                <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
                                <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
                                <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li>
                            </ul>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="box-title m-t-40">General Info</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td width="390">Brand</td>
                                            <td> Stellar </td>
                                        </tr>
                                        <tr>
                                            <td>Delivery Condition</td>
                                            <td> Knock Down </td>
                                        </tr>
                                        <tr>
                                            <td>Seat Lock Included</td>
                                            <td> Yes </td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td> Office Chair </td>
                                        </tr>
                                        <tr>
                                            <td>Style</td>
                                            <td> Contemporary &amp; Modern </td>
                                        </tr>
                                        <tr>
                                            <td>Wheels Included</td>
                                            <td> Yes </td>
                                        </tr>
                                        <tr>
                                            <td>Upholstery Included</td>
                                            <td> Yes </td>
                                        </tr>
                                        <tr>
                                            <td>Upholstery Type</td>
                                            <td> Cushion </td>
                                        </tr>
                                        <tr>
                                            <td>Head Support</td>
                                            <td> No </td>
                                        </tr>
                                        <tr>
                                            <td>Suitable For</td>
                                            <td> Study &amp; Home Office </td>
                                        </tr>
                                        <tr>
                                            <td>Adjustable Height</td>
                                            <td> Yes </td>
                                        </tr>
                                        <tr>
                                            <td>Model Number</td>
                                            <td> F01020701-00HT744A06 </td>
                                        </tr>
                                        <tr>
                                            <td>Armrest Included</td>
                                            <td> Yes </td>
                                        </tr>
                                        <tr>
                                            <td>Care Instructions</td>
                                            <td> Handle With Care, Keep In Dry Place, Do Not Apply Any Chemical For Cleaning. </td>
                                        </tr>
                                        <tr>
                                            <td>Finish Type</td>
                                            <td> Matte </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-box">

        
        <h4 class="box-title">Related Products</h4>
        <hr>
        <div class="row">
            @foreach ($products as $product)
            <a href="{{ route('galeri.show', [$product->id])}}">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <div class="product-img">
                            <div class="container">
                                @if($product->tampak_depan)
                                    <img class="place-self-center" src="{{asset('storage/'. $product->tampak_depan)}}" width="200px" height="280px"/>    
                                @else
                                    No avatar
                                    @endif </td>
                                <div class="overlay">
                                    @if($product->tampak_belakang)
                                    <img class="text " src="{{asset('storage/'. $product->tampak_belakang)}}" class="place-self-center" width="200px" height="280px"/>
                                    @else
                                    No avatar
                                    @endif </td>
                                </div>
                            </div>
                        
                        </div>
                        <div class="product-text">
                            <h3 class="box-title m-b-0">{{Str::limit($product->product_name,25)}}</h3>
                            <small class="text-muted db">{{Str::limit($product->deskripsi,40)}}</small>
                            <a href="{{ route('galeri.edit', [$product->id])}}" class="pro-dis bg-danger">Buy <br> Now</a>
                            @if (Str::limit($product->price,6)>Str::limit($product->price,7))
                                <h3 class="pro-price m-b-0">Rp{{$product->price}}
                                    <span class="old-price">Rp{{$product->price+20000}}</span>
                                </h3>
                            @else
                                <h3 class="pro-price m-b-0">Rp{{Str::limit($product->price,8)}}
                                    <span class="old-price">Rp{{Str::limit($product->price+20000,5)}}</span>
                                </h3>
                            @endif  
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <tfoot>
            <div class="row">
                <div class="col-md-5">
                    
                </div>
                <div class="col-md-5">
                    <tr class="text-right">
                        <td colspan=10>
                            {{$products->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </div>
            </div>
        </tfoot>
    </div>
@endsection