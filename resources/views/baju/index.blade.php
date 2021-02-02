@extends('layouts.global')

@section('title') Manage Order
    
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

  <div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="m-l-10">
                        <h3 class="box-title m-b-0 text-left">List Order </h3>
                        <p class="text-muted text-left">Tekan <code>detail</code> untuk melihat info ukuran.</p>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <form action="{{route('baju.index')}}" class="m-t-20">
                        <div class="row">
                            <div class="col-md-6 m-b-5">  
                                <input value="{{Request::get('keyword')}}" name="keyword" class="form-control" type="text" placeholder="Filter berdasarkan Nama"/>
                            </div>
                            
                            <div class="col-md-6">
                                <input {{Request::get('status') == 'PROCESS' ? 'checked' : ''}} value="PROCESS" name="status" type="radio" id="process">
                                <label for="process" class="m-r-5">Process</label>
                                <input {{Request::get('status') == 'SUCCESS' ? 'checked' : ''}} value="SUCCESS" name="status" type="radio" id="success">
                                <label for="success" class="m-r-5">Success</label>
                                            
                                <button type="submit" value="Filter" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>   
                            </div>
                        </div>
                        
                            
                    </form>
                </div>             
            </div>
            <br>
             
                <div class="table-responsive m-t-10 m-l-20">
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
                                <td>{{Str::limit($tbl->title,30)}}</td>
                                <td>{{$tbl->kategori}}</td>
                                <td>{{$tbl->jenis_ukuran}}</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> {{$tbl->created_at->diffForHumans()}}</span> </td>
                                <td>
                                    @if($tbl->status == "PROCESS")
                                        <div class="label label-table label-info">{{$tbl->status}}</div>
                                    @else
                                        <div class="label label-table label-success">{{$tbl->status}}</div>
                                    @endif
                                </td>
                                
                                
                                <td>
                                    <form
                                        onsubmit="return confirm('Delete this order permanently?')"
                                        class="d-inline"
                                        action="{{route('baju.destroy', [$tbl->id])}}"
                                        method="POST">
                                        @csrf

                                    <a href="{{route('baju.show', [$tbl->id])}}"
                                        class="btn btn-primary btn-sm m-b-5"><i class="fa fa-list"></i></a>
                                    <a href="{{route('baju.edit', [$tbl->id])}}"
                                        class="btn btn-info btn-sm m-b-5"><i class="fa fa-pencil"></i></a>
                                    
                                    <a href="{{route('order.edit', [$tbl->id])}}"
                                        class="btn btn-success btn-sm m-b-5"><i class="fa fa-shopping-bag"></i></a>
                                    
                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="DELETE">
                                    <button type="submit"
                                        value="Delete"
                                        class="btn btn-danger btn-sm m-b-5"><i class="fa fa-trash"></i>
                                    </button>
                        
                            
                                    </form>
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