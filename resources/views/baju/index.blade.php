@extends('layouts.global')

@section('title') Manage Order
    
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-success">
  {{session('status')}}
</div>
@endif
<table class="table table-bordered">
    <thead>
      <tr>
        <th><b>Name</b></th>
        <th><b>Kategori</b></th>
        <th><b>jenis_ukuran</b></th>
        <th><b>lingkar_badan</b></th>
        <th><b>lingkar_pinggang</b></th>
        <th><b>lingkar_pinggul</b></th>
        <th><b>lingkar_pipa</b></th>
        <th><b>lingkar_paha</b></th>
        <th><b>lingkar_lutut</b></th>
        <th><b>lebar_muka</b></th>
        <th><b>lebar_punggung</b></th>
        <th><b>lebar_lengan</b></th>
        <th><b>lebar_ban_lengan</b></th>
        <th><b>panjang_punggung</b></th>
        <th><b>panjang_muka</b></th>
        <th><b>panjang_baju</b></th>
        <th><b>panjang_lengan</b></th>
        <th><b>panjang_rok</b></th>
        <th><b>panjang_celana</b></th>
        <th><b>panjang_krah</b></th>
        <th><b>Waktu</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach($table as $tbl)
        <tr>
          <td>{{$tbl->title}}</td>
          <td>{{$tbl->kategori}}</td>
          <td>{{$tbl->jenis_ukuran}}</td>
          <td>{{$tbl->lingkar_badan}}</td>
          <td>{{$tbl->lingkar_pinggang}}</td>
          <td>{{$tbl->lingkar_pinggul}}</td>
          <td>{{$tbl->lingkar_pipa}}</td>
          <td>{{$tbl->lingkar_paha}}</td>
          <td>{{$tbl->lingkar_lutut}}</td>
          <td>{{$tbl->lebar_muka}}</td>
          <td>{{$tbl->lebar_punggung}}</td>
          <td>{{$tbl->lebar_lengan}}</td>
          <td>{{$tbl->lebar_ban_lengan}}</td>
          <td>{{$tbl->panjang_punggung}}</td>
          <td>{{$tbl->panjang_muka}}</td>
          <td>{{$tbl->panjang_baju}}</td>
          <td>{{$tbl->panjang_lengan}}</td>
          <td>{{$tbl->panjang_rok}}</td>
          <td>{{$tbl->panjang_celana}}</td>
          <td>{{$tbl->panjang_krah}}</td>
          <td>{{$tbl->created_at}}</td>
        </tr>
      @endforeach 
    </tbody>
  </table>
@endsection