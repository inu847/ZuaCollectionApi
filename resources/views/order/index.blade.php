@extends('layouts.print')

@section('title') Price
    
@endsection

@section('content')
@foreach ($order as $no => $ord)
<div class="row">
    <div class="col-md-12">
        <div class="white-box printableArea">
            <h3><b>INVOICE</b> <span class="pull-right">{{'#'}}{{$ord->id}}</span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">ZuaCollection</b></h3>
                            <p class="text-muted m-l-5">E/104,
                                <br/> Minare SK,
                                <br/> Istanbul,
                                <br/> Turkey-34000.</p>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3>To,</h3>
                            <h4 class="font-bold">Price,</h4>
                            <p class="text-muted m-l-30">{{$ord->title}}
                                <br/> {{'Selopuro.'}}
                                <br/> Indonesia.</p>
                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i>{{$ord->created_at->format(' l, d M Y')}}</p>
                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> {{date('l, d-m-Y')}}</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Description</th>
                                    <th class="text-right">Jenis Barang</th>
                                    <th class="text-right">Unit Cost</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                    <tr>
                                        <td class="text-center">{{ ++$no }}</td>
                                        <td class="">{{$ord->kategori}}</td>
                                        <td class="text-right">{{'Baju'}}</td>
                                        <td class="text-right">{{'1'}}</td>
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <p>Sub - Total amount:  Rp.{{$ord->invoice}}</p>
                        <hr>
                    <h3><b>Total : </b>Rp.{{$ord->invoice}}</h3> </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <button onclick="window.print()" class="btn btn-danger btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection