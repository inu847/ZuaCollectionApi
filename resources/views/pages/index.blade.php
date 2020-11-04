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

            <form action="{{route('pages.index')}}">
                <input {{Request::get('status') == 'SUCCESS' ? 'checked' : ''}}
                value="SUCCESS"
                name="status"
                type="hidden"
                class="text-right"
                id="success">
            </form>

            <table class="display nowrap" cellspacing="0" width="100%">
                
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td>{{$page->kategori}}</td>
                        <td>{{$page->invoice}}</td>
                        <td><a href="{{route('order.edit', [$page->id])}}"
                            class="btn btn-success btn-sm m-t-10"><i class="fa fa-shopping-bag"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
</div>




@endsection