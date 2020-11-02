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

            <div style="float: left; margin-right: 350px;">
                <h3 class="box-title m-b-0">List Order </h3>
                <p class="text-muted m-b-20">Tekan <code>detail</code> untuk melihat info ukuran.</p>
            </div>
            <div class="row m-t-15">
                        <form action="{{route('baju.index')}}">
                            <div class="col-md-3 m-b-15">
                                <input
                                    value="{{Request::get('title')}}"
                                    name="title"
                                    class="form-control"
                                    type="text"
                                    placeholder="Filter berdasarkan Nama"/>
                            </div>
                                <input {{Request::get('status') == 'PROCESS' ? 'checked' : ''}}
                                value="PROCESS"
                                name="status"
                                type="radio"
                                class="m-l-20 "
                                id="process">
                                <label for="process" class="m-r-5">Process</label>
                                <input {{Request::get('status') == 'SUCCESS' ? 'checked' : ''}}
                                value="SUCCESS"
                                name="status"
                                type="radio"
                                id="success">
                                <label for="success" class="m-r-5">Success</label>
                            
                            <input type="submit"
                           value="Filter"
                           class="btn btn-primary fa fa-search">    
                           </form>                
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
                                <a href=""
                                        class="btn btn-success btn-sm"><i class="fa fa-shopping-bag"></i></a>
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
                    <tfoot>
                        <tr class="text-right">
                        <td colspan=10>
                            {{$table->appends(Request::all())->links()}}
                        </td>
                        </tr>
                       </tfoot>
                       
                </table>
            </div>
        </div>
    </div>
</div>
@endsection