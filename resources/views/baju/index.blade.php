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
            <h3 class="box-title m-b-0">Responsive Table </h3>
            <p class="text-muted m-b-20">Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive </code></p>
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
                            <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$tbl->created_at->format('l, d M Y H:i:s')}}</span> </td>
                            <td>
                                <div class="label label-table label-success">Paid</div>
                            </td>
                            <td>
                              <a href="{{route('baju.show', [$tbl->id])}}"
                                  class="btn btn-primary btn-sm">Detail</a>
                                  <a href="{{route('baju.edit', [$tbl->id])}}"
                                    class="btn btn-info btn-sm">Edit</a>
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