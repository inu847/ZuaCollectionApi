@extends('layouts.global')

@section('title')
    Detail Order
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <div style="float: left;">
            <h3 class="box-title m-b-0">Detail Order</h3>
            <p class="text-muted m-b-20">Sesuaikan ukuran dibawah. jika ada kesalahan data silahkan tekan tombol edit disebelah kanan.</p>
            </div>
            <div style="float: right; margin-top: 30px;">
                <a href="{{route('listorder.edit', [$baju->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>
            </div>
            <table class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
                <thead>
                    <tr >
                        <th class="p-l-20">{{('Buyer : ')}} {{$baju->first_name}} {{$baju->last_name}} </th>
                        <th class="p-l-20">Ukuran</th>
                        {{-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="p-l-20">Full Name</td>
                        <td class="p-l-20">{{$baju->first_name}} {{$baju->last_name}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Gender</td>
                        <td class="p-l-20">{{$baju->gender}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Birth</td>
                        <td class="p-l-20">{{$baju->birth}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Product Name</td>
                        <td class="p-l-20">{{$baju->product_name}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Price</td>
                        <td class="p-l-20 "><div class="label label-table label-success">Rp. {{$baju->price}}</div></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Address 1</td>
                        <td class="p-l-20">{{$baju->address1}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Address 2</td>
                        <td class="p-l-20">{{$baju->address2}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">City</td>
                        <td class="p-l-20">{{$baju->city}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">State</td>
                        <td class="p-l-20">{{$baju->state}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Post Code</td>
                        <td class="p-l-20">{{$baju->post_code}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Country</td>
                        <td class="p-l-20">{{$baju->country}}</td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Status</td>
                        @if($baju->status == "PENDING")
                            <td class="p-l-20"><div class="label label-table label-info">{{$baju->status}}</div></td>
                        @elseif($baju->status == "DIKIRIM")
                            <td class="p-l-20"><div class="label label-table label-danger">{{$baju->status}}</div></td>
                        @else
                            <td class="p-l-20"><div class="label label-table label-success">{{$baju->status}}</div></td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection