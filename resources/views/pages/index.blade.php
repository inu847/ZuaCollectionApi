@extends('layouts.global')

@section('title')
   List Product
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
            <div class="col-md-4">
                <h3 class="box-title m-b-5">Product View</h3>
                <p class="text-muted m-b-30">list of products that are currently published</p>
            </div>
            <form action="{{ route('pages.index')}}">
            <div class="col-md-5 m-t-10">
                <div class="row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Filter Berdasarkan Nama Product">
                            <div class="input-group-addon text-blue">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="price" id="" class="form-control">
                            <option value=""> Filter Harga</option>
                            <option value="99000"> {{'<'}}Rp.100.000</option>
                            <option value="100000"> {{'>'}}Rp.100.000</option>
                            <option value="200000"> {{'>'}}Rp.200.000</option>
                            <option value="500000"> {{'>'}}Rp.500.000</option>
                            <option value="1000000"> {{'>'}}Rp.1.000.000</option>
                        </select>
                    </div>
                </div>
                
                
                    
            </div>
            <div class="col-md-3 m-b-30 m-t-10">
                <button class="btn btn-info" type="submit"><i class="fa fa-search"></i> Submit</button>
                <a href="{{ route('pages.create')}}" type="submit" class="btn btn-danger waves-effect waves-light"><i class="fa fa-plus-circle"></i> Create New Product</a>
            </div>
            </form>
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
        <tfoot>
            <div class="row">
                <div class="col-md-5">
                    
                </div>
                <div class="col-md-5">
                    <tr class="text-right">
                        <td colspan=10>
                            {{$pages->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </div>
            </div>
        </tfoot>
    </div>
</div>




@endsection