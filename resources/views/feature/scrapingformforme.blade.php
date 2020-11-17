@extends('layouts.app')

@section('title')
    Form Scraping
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-stripped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Jenis</th>
                                <th>invoice</th>
                                <th>Success_at</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($scraping as $page)
                                <tr>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->kategori}}</td>
                                    <td>Rp.{{$page->invoice}}</td>
                                    <td><i class="fa fa-clock-o"></i> {{$page->updated_at}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
        


