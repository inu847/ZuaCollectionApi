@extends('layouts.global')

@section('title')
    List User
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="row">
            <div class="white-box">
                <table class="table table-responsive">
                   
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Join At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    @if( $user->roles == 'ADMIN')
                                        <span class="label label-success">{{ $user->roles }}</span>
                                    @elseif( $user->roles == 'MEMBER')
                                        <span class="label label-info">{{ $user->roles }}</span>
                                    @else
                                        <span class="label label-danger">{{ $user->roles }}</span>
                                    @endif
                                </td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="https://wa.me/{{$user->phone}}" class="btn btn-warning"><span class="fa fa-whatsapp"></span></a>
                                    <a href="{{ route('user.show', [$user->id])}}" class="btn btn-info"><span class="fa fa-list"></span></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <tfoot>
                        <tr class="text-right">
                            <td colspan=10>
                                {{$users->appends(Request::all())->links()}}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection