@extends('layouts.global')
 @section('title') Add Order
     
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
            <h3 class="box-title m-b-0">Create New Orders</h3>
            <p class="text-muted m-b-30 font-13">Tambahkan kolom. Jika kosong isi dengan nilai 0</p>
        </div>
        
        <form 
            enctype="multipart/form-data"
            action="{{route('baju.store')}}"
            method="POST">
            @csrf
        <div class="col-md-6">
            <div class="white-box form-horizontal m-t-10 p-b-35">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nama*</label>
                        <div class="col-sm-9">
                            <input value="{{old('name')}}" type="text" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" id="nama" placeholder="Nama" name="name"> 
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori*</label>
                        <div class="col-sm-9">
                            <select class="form-control {{$errors->first('kategori') ? "is-invalid" : "" }}" name="kategori">
                                <option value="Atasan Wanita">Pilih Kategori</option>
                                <option id="atasan_wanita" value="Atasan Wanita">Atasan Wanita</option>
                                <option id="hem" value="Hem">Hem</option>
                                <option id="safari" value="Safari">Safari</option>
                                <option id="semi_safari" value="Semi Safari">Semi Safari</option>
                                <option id="rok" value="Rok">Rok</option>
                                <option id="gamis" value="Gamis">Gamis</option>
                                <option id="celana" value="Celana">Celana</option>
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('ketegori')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Ukuran*</label>
                        <div class="col-sm-9">
                            <select class="form-control {{$errors->first('jenis_ukuran') ? "is-invalid" : "" }}" name="jenis_ukuran">
                                <option value="Ukuran Badan">Pilih Kategori</option>
                                <option id="ukuran_badan" value="Ukuran Badan">Ukuran Badan</option>
                                <option id="baju_jadi" value="Baju Jadi">Baju Jadi</option>
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('jenis_ukuran')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lingkar_badan" class="col-sm-3 control-label">Lingkar Badan</label>
                        <div class="col-sm-9">
                        <input value="{{old('lingkar_badan')}}" type="number" class="form-control {{$errors->first('lingkar_badan') ? "is-invalid": ""}}" id="lingkar_badan" name="lingkar_badan" placeholder="Lingkar Badan"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_badan')}}
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" value="PROCESS" id="PROCESS" name="status">
                                            
                    <div class="form-group">
                        <label for="lingkar_pinggang" class="col-sm-3 control-label">Lingkar Pinggang*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lingkar_pinggang')}}" type="number" class="form-control {{$errors->first('lingkar_pinggang') ? "is-invalid": ""}}" id="lingkar_pinggang" name="lingkar_pinggang" placeholder="Lingkar Pinggang"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_pinggang')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lingkar_pinggul" class="col-sm-3 control-label">Lingkar Pinggul*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lingkar_pinggul')}}" type="number" class="form-control {{$errors->first('lingkar_pinggul') ? "is-invalid": ""}}" id="lingkar_pinggul" name="lingkar_pinggul" placeholder="Lingkar Pinggul"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_pinggul')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lebar_muka" class="col-sm-3 control-label">Lebar Muka*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lebar_muka')}}" type="number" class="form-control {{$errors->first('lebar_muka') ? "is-invalid": ""}}" id="lebar_muka" name="lebar_muka" placeholder="Lebar Muka"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lebar_muka')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lebar_punggung" class="col-sm-3 control-label">Lebar Punggung*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lebar_punggung')}}" type="number" class="form-control {{$errors->first('lebar_punggung') ? "is-invalid": ""}}" id="lebar_punggung" name="lebar_punggung" placeholder="Lebar Punggung"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lebar_punggung')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_punggung" class="col-sm-3 control-label">Panjang Punggung*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_punggung')}}" type="number" class="form-control {{$errors->first('panjang_punggung') ? "is-invalid": ""}}" id="panjang_punggung" name="panjang_punggung" placeholder="Panjang Punggung"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_punggung')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_muka" class="col-sm-3 control-label">Panjang Muka*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_muka')}}" type="number" class="form-control {{$errors->first('panjang_muka') ? "is-invalid": ""}}" id="panjang_muka" name="panjang_muka" placeholder="Panjang Muka"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_muka')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_baju" class="col-sm-3 control-label">Panjang Baju*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_baju')}}" type="number" class="form-control {{$errors->first('panjang_baju') ? "is-invalid": ""}}" id="panjang_baju" name="panjang_baju" placeholder="Panjang Baju"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_baju')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
                <div class="col-md-6">
                    <div class="white-box form-horizontal m-t-10 p-b-0">
                    <div class="form-group">
                        <label for="panjang_lengan" class="col-sm-3 control-label">Panjang Lengan*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_lengan')}}" type="number" class="form-control {{$errors->first('panjang_lengan') ? "is-invalid": ""}}" id="panjang_lengan" name="panjang_lengan" placeholder="Panjang Lengan"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_lengan')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lebar_lengan" class="col-sm-3 control-label">Lebar Lengan*</label>
                            <div class="col-sm-9">
                                <input value="{{old('lebar_lengan')}}" type="number" class="form-control {{$errors->first('lebar_lengan') ? "is-invalid": ""}}" id="lebar_lengan" name="lebar_lengan" placeholder="Lebar Lengan"> 
                                <div class="invalid-feedback">
                                    {{$errors->first('lebar_lengan')}}
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="panjang_rok" class="col-sm-3 control-label">Panjang Rok*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_rok')}}" type="number" class="form-control {{$errors->first('panjang_rok') ? "is-invalid": ""}}" id="panjang_rok" name="panjang_rok" placeholder="Panjang Rok"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_rok')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_celana" class="col-sm-3 control-label">Panjang Celana*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_celana')}}" type="number" class="form-control {{$errors->first('panjang_celana') ? "is-invalid": ""}}" id="panjang_celana" name="panjang_celana" placeholder="Panjang Celana"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_celana')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lingkar_pipa" class="col-sm-3 control-label">Lingkar Pipa*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lingkar_pipa')}}" type="number" class="form-control {{$errors->first('lingkar_pipa') ? "is-invalid": ""}}" id="lingkar_pipa" name="lingkar_pipa" placeholder="Lingkar Pipa"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_pipa')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lingkar_paha" class="col-sm-3 control-label">Lingkar Paha*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lingkar_paha')}}" type="number" class="form-control {{$errors->first('lingkar_paha') ? "is-invalid": ""}}" id="lingkar_paha" name="lingkar_paha" placeholder="Lingkar Paha"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_paha')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lingkar_lutut" class="col-sm-3 control-label">Lingkar Lutut*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lingkar_lutut')}}" type="number" class="form-control {{$errors->first('lingkar_lutut') ? "is-invalid": ""}}" id="lingkar_lutut" name="lingkar_lutut" placeholder="Lingkar Lutut"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lingkar_lutut')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_krah" class="col-sm-3 control-label">Panjang Krah*</label>
                        <div class="col-sm-9">
                            <input value="{{old('panjang_krah')}}" type="number" class="form-control {{$errors->first('panjang_krah') ? "is-invalid": ""}}" id="panjang_krah" name="panjang_krah" placeholder="Panjang Krah"> 
                            <div class="invalid-feedback">
                                {{$errors->first('panjang_krah')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lebar_ban_lengan" class="col-sm-3 control-label">Lebar Ban Lengan*</label>
                        <div class="col-sm-9">
                            <input value="{{old('lebar_ban_lengan')}}" type="number" class="form-control {{$errors->first('lebar_ban_lengan') ? "is-invalid": ""}}" id="lebar_ban_lengan" name="lebar_ban_lengan" placeholder="Lebar Ban Lengan"> 
                            <div class="invalid-feedback">
                                {{$errors->first('lebar_ban_lengan')}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="avatar" class="col-sm-3 control-label">Gambar</label>
                        <div class="col-sm-9">
                            <input value="{{old('avatar')}}" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid": ""}}" id="avatar" name="avatar"> 
                            <div class="invalid-feedback">
                                {{$errors->first('avatar')}}
                            </div>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 m-t-1">
                            <div class="checkbox checkbox-success">
                                <input id="checkbox33" type="checkbox" required>
                                <label for="checkbox33">Check me out !</label>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <div class="col-sm-offset-3 waves-effect">
                            <button class="btn btn-danger waves-light m-l-15" type="submit" value="Submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
