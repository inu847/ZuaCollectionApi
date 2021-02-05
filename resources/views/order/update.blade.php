@extends('layouts.global')
 @section('title') Edit Data
     
 @endsection
 @section('content')
    @if(session('status'))
        <div class="alert alert-success">
        {{session('status')}}
        </div>
    @endif

    <div class="white-box">
        <div class="row">
            <div class="m-l-40">
                <h3 class="box-title m-b-0">Checkout</h3>
                <p class="text-muted m-b-30 font-13">Form invoice. take a price in input invoice</p>
            </div>
            <form action="{{route('baju.invoice', [$order->id])}}"
                  enctype="multipart/form-data"
                  method="POST">
                @csrf
                <input type="hidden"
                    value="PUT"
                    name="_method">

                <div class="white-box m-t-10 p-b-35">
                    <div class="table-responsive">
                        <table class="table">    
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
            
                            <tbody>
                            <tr>
                                <td>{{$order->title}}</td>
                                <td>{{$order->kategori}}</td>
                                <td class="col-md-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input value="{{old('invoice')}}" type="number" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" id="invoice" placeholder=" Total Price" name="invoice">
                                    </div>
                                    <div class="invalid-feedback">
                                        {{$errors->first('invoice')}}
                                    </div> 
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
            
                    <input value=" {{$order->title}} " type="hidden" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" id="nama" placeholder="Nama" name="name"> 
                            
                    <input type="hidden" class="form-control {{$errors->first('kategori') ? "is-invalid" : "" }}" name="kategori" value="{{$order->kategori}}">
             
                    <input type="hidden" class="form-control {{$errors->first('jenis_ukuran') ? "is-invalid" : "" }}" name="jenis_ukuran" id="ukuran_badan" value="{{$order->jenis_ukuran}}">
            
                    <input value="{{$order->lingkar_badan}}" type="hidden" class="form-control {{$errors->first('lingkar_badan') ? "is-invalid": ""}}" id="lingkar_badan" name="lingkar_badan" placeholder="Lingkar Badan"> 
            
                    <input value="{{$order->lingkar_pinggang}}" type="hidden" class="form-control {{$errors->first('lingkar_pinggang') ? "is-invalid": ""}}" id="lingkar_pinggang" name="lingkar_pinggang" placeholder="Lingkar Pinggang"> 
            
                    <input value="{{$order->lingkar_pinggul}}" type="hidden" class="form-control {{$errors->first('lingkar_pinggul') ? "is-invalid": ""}}" id="lingkar_pinggul" name="lingkar_pinggul" placeholder="Lingkar Pinggul"> 
            
                    <input value="{{$order->lingkar_pipa}}" type="hidden" class="form-control {{$errors->first('lingkar_pipa') ? "is-invalid": ""}}" id="lingkar_pipa" name="lingkar_pipa" placeholder="Lingkar Pipa"> 
            
                    <input value="{{$order->lingkar_paha}}" type="hidden" class="form-control {{$errors->first('lingkar_paha') ? "is-invalid": ""}}" id="lingkar_paha" name="lingkar_paha" placeholder="Lingkar Paha"> 
            
                    <input value="{{$order->lingkar_lutut}}" type="hidden" class="form-control {{$errors->first('lingkar_lutut') ? "is-invalid": ""}}" id="lingkar_lutut" name="lingkar_lutut" placeholder="Lingkar Lutut"> 
            
                    <input value="{{$order->lebar_muka}}" type="hidden" class="form-control {{$errors->first('lebar_muka') ? "is-invalid": ""}}" id="lebar_muka" name="lebar_muka" placeholder="Lebar Muka"> 
            
                    <input value="{{$order->lebar_punggung}}" type="hidden" class="form-control {{$errors->first('lebar_punggung') ? "is-invalid": ""}}" id="lebar_punggung" name="lebar_punggung" placeholder="Lebar Punggung"> 
              
                    <input value="{{$order->lebar_lengan}}" type="hidden" class="form-control {{$errors->first('lebar_lengan') ? "is-invalid": ""}}" id="lebar_lengan" name="lebar_lengan" placeholder="Lebar Lengan"> 
             
                    <input value="{{$order->lebar_ban_lengan}}" type="hidden" class="form-control {{$errors->first('lebar_ban_lengan') ? "is-invalid": ""}}" id="lebar_ban_lengan" name="lebar_ban_lengan" placeholder="Lebar Ban Lengan"> 
            
                    <input value="{{$order->panjang_punggung}}" type="hidden" class="form-control {{$errors->first('panjang_punggung') ? "is-invalid": ""}}" id="panjang_punggung" name="panjang_punggung" placeholder="Panjang Punggung"> 
            
                    <input value="{{$order->panjang_baju}}" type="hidden" class="form-control {{$errors->first('panjang_baju') ? "is-invalid": ""}}" id="panjang_baju" name="panjang_baju" placeholder="Panjang Punggung"> 
            
                    <input value="{{$order->panjang_muka}}" type="hidden" class="form-control {{$errors->first('panjang_muka') ? "is-invalid": ""}}" id="panjang_muka" name="panjang_muka" placeholder="Panjang Muka"> 
            
                    <input value="{{$order->panjang_order}}" type="hidden" class="form-control {{$errors->first('panjang_order') ? "is-invalid": ""}}" id="panjang_order" name="panjang_order" placeholder="Panjang order"> 
            
                    <input value="{{$order->panjang_lengan}}" type="hidden" class="form-control {{$errors->first('panjang_lengan') ? "is-invalid": ""}}" id="panjang_lengan" name="panjang_lengan" placeholder="Panjang Lengan"> 
            
                    <input value="{{$order->panjang_rok}}" type="hidden" class="form-control {{$errors->first('panjang_rok') ? "is-invalid": ""}}" id="panjang_rok" name="panjang_rok" placeholder="Panjang Rok"> 
            
                    <input value="{{$order->panjang_celana}}" type="hidden" class="form-control {{$errors->first('panjang_celana') ? "is-invalid": ""}}" id="panjang_celana" name="panjang_celana" placeholder="Panjang Celana"> 
            
                    <input value="{{$order->panjang_krah}}" type="hidden" class="form-control {{$errors->first('panjang_krah') ? "is-invalid": ""}}" id="panjang_krah" name="panjang_krah" placeholder="Panjang Krah"> 
            
                    <input value="{{$order->avatar}}" type="hidden" class="form-control {{$errors->first('avatar') ? "is-invalid": ""}}" id="avatar" name="avatar" placeholder="Panjang Krah">            
                    
                    <div class="form-group text-right m-r-15">
                        <div class="waves-effect">
                            <button class="btn btn-danger waves-light" type="submit" value="Checkout"><i class="fa fa-shopping-basket"></i> Checkout</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 @endsection
