<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order =  Baju::get();
        
        return view('order.index', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Baju::findOrFail($id);
        
        return view('order.update', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),[
            "name" => "required|min:1|max:30",
            "lingkar_badan" => "min:1|max:4",
            "lingkar_pinggang" => "min:1|max:4",
            "lingkar_pinggul" => "min:1|max:4",
            "lingkar_pipa" => "min:1|max:4",
            "lingkar_paha" => "min:1|max:4",
            "lingkar_lutut" => "min:1|max:4",
            "lebar_muka" => "min:1|max:4",
            "lebar_punggung" => "min:1|max:4",
            "lebar_punggung" => "min:1|max:4",
            "lebar_ban_lengan" => "min:1|max:4",
            "panjang_punggung" => "min:1|max:4",
            "panjang_muka" => "min:1|max:4",
            "panjang_baju" => "min:1|max:4",
            "panjang_lengan" => "min:1|max:4",
            "panjang_rok" => "min:1|max:4",
            "panjang_celana" => "min:1|max:4",
            "panjang_krah" => "min:1|max:4",
            "invoice" => "min:5|max:15",
            ])->validate();

        $title = $request->get('name');
        $kategori = $request->get('kategori');
        $jenis_ukuran = $request->get('jenis_ukuran');
        $status = $request->get('status');
        $lingkar_badan = $request->get('lingkar_badan');
        $lingkar_pinggang = $request->get('lingkar_pinggang');
        $lingkar_pinggul = $request->get('lingkar_pinggul');
        $lingkar_pipa = $request->get('lingkar_pipa');
        $lingkar_paha = $request->get('lingkar_paha');
        $lingkar_lutut = $request->get('lingkar_lutut');
        $lebar_muka = $request->get('lebar_muka');
        $lebar_punggung = $request->get('lebar_punggung');
        $lebar_lengan = $request->get('lebar_lengan');
        $lebar_ban_lengan = $request->get('lebar_ban_lengan');
        $panjang_punggung = $request->get('panjang_punggung');
        $panjang_muka = $request->get('panjang_muka');
        $panjang_baju = $request->get('panjang_baju');
        $panjang_lengan = $request->get('panjang_lengan');
        $panjang_rok = $request->get('panjang_rok');
        $panjang_celana = $request->get('panjang_celana');
        $panjang_krah = $request->get('panjang_krah');
        $invoice = $request->get('invoice');

        $order = Baju::findOrFail($id);
        
        $order->title = $title;
        $order->kategori = $kategori;
        $order->jenis_ukuran = $jenis_ukuran;
        $order->status = $status;
        $order->lingkar_badan = $lingkar_badan;
        $order->lingkar_pinggang = $lingkar_pinggang;
        $order->lingkar_pinggul = $lingkar_pinggul;
        $order->lingkar_pipa = $lingkar_pipa;
        $order->lingkar_paha = $lingkar_paha;
        $order->lingkar_lutut = $lingkar_lutut;
        $order->lebar_muka = $lebar_muka;
        $order->lebar_punggung = $lebar_punggung;
        $order->lebar_lengan = $lebar_lengan;
        $order->lebar_ban_lengan = $lebar_ban_lengan;
        $order->panjang_punggung = $panjang_punggung;
        $order->panjang_muka = $panjang_muka;
        $order->panjang_baju = $panjang_baju;
        $order->panjang_lengan = $panjang_lengan;
        $order->panjang_rok = $panjang_rok;
        $order->panjang_celana = $panjang_celana;
        $order->panjang_krah = $panjang_krah;
        $order->invoice = $invoice;

        $order->save();
        return redirect()->route('order.index', ['order' => $order]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
