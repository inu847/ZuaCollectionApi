@extends('layouts.global')

@section('title') Manage Order
    
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
  <div class="row">
    <div class="col-lg-12">
        <div class="white-box">

                            
            <div class="col-md-6 m-b-20">                 
                <h3 class="box-title m-b-0">List Order </h3>
                <p class="text-muted m-b-20">Tekan <code>detail</code> untuk melihat info ukuran.</p>
            </div>
            
            {{-- <div class="checkbox checkbox-success checkbox-circle">
                <input {{Request::get('status') == 'SUCCESS' ? 'checked' : ''}}
                value="SUCCESS"
                name="status"
                type="checkbox"
                class="form-control"
                id="success" checked>
                <label for="success">Success</label>
            </div>
            <div class="checkbox checkbox-info checkbox-circle">
                <input {{Request::get('status') == 'PROCESS' ? 'checked' : ''}}
                value="PROCESS"
                name="status"
                type="checkbox"
                class="form-control"
                id="process" checked>
                <label for="process">Process</label>
            </div> --}}
            <div class="row">    
                <div class="input-group col-md-5 m-b-20 m-t-30">
                    <form class="form-group" role="search" action="{{route('baju.index')}}">
                        <input value="{{Request::get('keyword')}}" name="keyword" class="form-control" type="text" placeholder="Search"> 
                    </form>
                    <span class="input-group-btn">
                        <button type="submit" class="btn waves-effect waves-light btn-info" value="Filter"><i class="fa fa-search"></i></button>
                    </span>
                </div>
                    
                </div>
                
            <br>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Kategori</th>
                            <th>Jenis Ukuran</th>                            
                            <th>Waktu Pesan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($table as $tbl)
                        <tr>
                            <td>{{$tbl->title}}</td>
                            <td>{{$tbl->kategori}}</td>
                            <td>{{$tbl->jenis_ukuran}}</td>
                            {{-- masukkan code ini untuk waktu H:i:s --}}
                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$tbl->created_at->format('l, d M Y')}}</span> </td>
                            <td>
                            
                                @if($tbl->status == "PROCESS")
                                <div class="label label-table label-info">{{$tbl->status}}</div>
                                @else
                                <div class="label label-table label-success">{{$tbl->status}}</div>
                                @endif
                               </td>
                               
                            
                            <td>
                                <a href="{{route('baju.show', [$tbl->id])}}"
                                  class="btn btn-primary btn-sm"><i class="fa fa-list"></i></a>
                                <a href="{{route('baju.edit', [$tbl->id])}}"
                                    class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                    {{-- <form
                                    onsubmit="return confirm('Delete this user permanently?')"
                                    class="d-inline"
                                    action="{{route('baju.destroy', [$tbl->id])}}"
                                    method="POST">
                                    @csrf
                                    <input
                                    type="hidden"
                                    name="_method"
                                    value="DELETE">
                                    <input
                                    type="submit"
                                    value="Delete"
                                    class="btn btn-danger btn-sm">
                                    </form> --}}
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection