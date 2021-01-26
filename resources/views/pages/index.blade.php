@extends('layouts.global')

@section('title')
   Form list Order Price 
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
@if(session('statusdel'))
<div class="alert alert-danger">
  {{session('statusdel')}}
</div>
@endif
<div class="col-sm-12">
    <div class="white-box">
        <div class="row">
            <div class="col-md-10">
                <h3 class="box-title m-b-0">Product View</h3>
                <p class="text-muted m-b-30">list of products that are currently published</p>
            </div>
            <div class="col-md-2">
                <a href="{{ route('pages.create')}}" type="submit" class="btn btn-danger waves-effect waves-light m-t-10">New Product</a>
            </div>
        </div>
        <div class="row">
            @foreach ($pages as $page)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <div class="product-img">
                            <div class="container">
                                @if($page->tampak_depan)
                                    <img class="place-self-center image img-responsive" src="{{asset('storage/'. $page->tampak_depan)}}"/>
                                @else
                                    No avatar
                                    @endif </td>
                                <div class="overlay">
                                    @if($page->tampak_belakang)
                                    <img class="text " src="{{asset('storage/'. $page->tampak_belakang)}}" class="img-responsive" />
                                    @else
                                    No avatar
                                    @endif </td>
                                </div>
                            </div>
                        </div>
                        <div class="product-text">
                            <h3 class="box-title m-b-0">{{Str::limit($page->product_name, 25)}}</h3>
                            <small class="text-muted db">{{Str::limit($page->deskripsi, 40)}}</small>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="pro-price m-b-0">Rp{{$page->price}}
                                        <span class="old-price">Rp{{$page->price+20000}}</span>
                                    </h3>
                                </div>
                                <div class="col-md-4">
                                    <form
                                        onsubmit="return confirm('Delete this user permanently?')"
                                        class="d-inline"
                                        action="{{route('pages.destroy', [$page->id])}}"
                                        method="POST">
                                        @csrf

                                        <a class="btn btn-success" href="{{ route('pages.edit', [$page->id])}}"><i class="fa fa-pencil float-right"></i></a>

                                        <input
                                            type="hidden"
                                            name="_method"
                                            value="DELETE">
                                        <button type="submit"
                                                value="Delete"
                                                class="btn btn-danger float-right"><i class="fa fa-trash"></i></button>
                                            
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
    </div>
</div>





@endsection