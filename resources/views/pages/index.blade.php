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
<div class="col-sm-12">
    <div class="white-box">
        <h3 class="box-title m-b-0">Success Price</h3>
        <p class="text-muted m-b-30"></p>

        <div class="table-responsive">
            <table class="display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>price</th>
                        <th>Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->kategori}}</td>
                        <td>{{$page->invoice}}</td>
                        <td><i class="fa fa-clock-o"></i> {{$page->updated_at->diffForhumans()}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-right">
                        <td colspan=10>
                            {{$pages->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>




@endsection