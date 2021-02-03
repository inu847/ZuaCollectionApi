@extends('layouts.global')

@section('title')
    Detail User {{$user->name}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="white-box">
                <div style="float: left;">
                <h3 class="box-title m-b-0">Detail Order</h3>
                <p class="text-muted m-b-20">Detail order. jika ada kesalahan data silahkan tekan tombol <code class="fa fa-pencil"> edit</code> disebelah kanan!.</p>
                </div>
                <div style="float: right; margin-top: 30px;">
                    <a href="{{route('user.edit', [$user->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <table class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
                    <thead>
                        <tr >
                            <th class="p-l-20">{{('User : ')}} {{$user->name}}</th>
                            <th class="p-l-20">Detail User</th>
                            {{-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                            <td class="p-l-20">Name</td>
                            <td class="p-l-20">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td class="p-l-20">Address</td>
                            <td class="p-l-20">{{$user->address}}</td>
                        </tr>
                        <tr>
                            <td class="p-l-20">Phone</td>
                            <td class="p-l-20">{{$user->phone}}  <a href="https://wa.me/{{$user->phone}}" class="label label-table label-warning"><i class="fa fa-whatsapp"></i></a></td>
                        </tr>
                        <tr>
                            <td class="p-l-20">Status</td>
                            @if( $user->roles == 'ADMIN')
                                <td><span class="label label-success">{{ $user->roles }}</span></td>
                            @elseif( $user->roles == 'MEMBER')
                                <td><span class="label label-info">{{ $user->roles }}</span></td>
                            @else
                                <td><span class="label label-danger">{{ $user->roles }}</span></td>
                            @endif
                        </tr>
                        <tr>
                            <td class="p-l-20">Created At</td>
                            <td class="p-l-20">{{$user->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection