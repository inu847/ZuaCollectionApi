@extends('layouts.global')

@section('title') Detail Order
    
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Column Toggle Table</h3>
            <p class="text-muted m-b-20">The Column Toggle Table allows the user to select which columns they want to be visible.</p>
            <table class="tablesaw table-striped table-hover table-bordered table" data-tablesaw-mode="columntoggle">
                <thead>
                    <tr >
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" class="p-l-20"> {{$baju->title}} </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Ukuran</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="p-l-20">Kategori</td>
                        <td>{{$baju->kategori}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Jenis Ukuran</td>
                        <td>{{$baju->jenis_ukuran}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar Badan</td>
                        <td>{{$baju->lingkar_badan}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar Pinggang</td>
                        <td>{{$baju->lingkar_pinggang}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar Pinggul</td>
                        <td>{{$baju->lingkar_pinggul}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar Pipa</td>
                        <td>{{$baju->lingkar_pipa}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar Paha</td>
                        <td>{{$baju->lingkar_paha}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lingkar lutut</td>
                        <td>{{$baju->lingkar_lutut}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lebar Muka</td>
                        <td>{{$baju->lebar_muka}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lebar Punggung</td>
                        <td>{{$baju->lebar_punggung}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lebar Lengan</td>
                        <td>{{$baju->lebar_lengan}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Lebar ban Lengan</td>
                        <td>{{$baju->lebar_ban_lengan}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Punggung</td>
                        <td>{{$baju->panjang_punggung}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Muka</td>
                        <td>{{$baju->panjang_muka}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Baju</td>
                        <td>{{$baju->panjang_baju}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Lengan</td>
                        <td>{{$baju->panjang_lengan}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Rok</td>
                        <td>{{$baju->panjang_rok}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                    <tr>
                        <td class="p-l-20">Panjang Celana</td>
                        <td>{{$baju->panjang_celana}}</td>
                        <td><a href="{{route('baju.edit', [$baju->id])}}"
                                    class="btn btn-info btn-sm">Edit</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection