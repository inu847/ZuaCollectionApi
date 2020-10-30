<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BajuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = \App\Models\Baju::paginate(10);

        return view('baju.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baju.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_clothes = new \App\Models\Baju;
        $new_clothes->title = $request->get('name');
        $new_clothes->kategori = json_encode($request->get('kategori'));
        $new_clothes->jenis_ukuran = json_encode($request->get('jenis_ukuran'));
        $new_clothes->lingkar_badan = $request->get('lingkar_badan');
        $new_clothes->lingkar_pinggang = $request->get('lingkar_pinggang');
        $new_clothes->lingkar_pinggul = $request->get('lingkar_pinggul');
        $new_clothes->lingkar_pipa = $request->get('lingkar_pipa');
        $new_clothes->lingkar_paha = $request->get('lingkar_paha');
        $new_clothes->lingkar_lutut = $request->get('lingkar_lutut');
        $new_clothes->lebar_muka = $request->get('lebar_muka');
        $new_clothes->lebar_punggung = $request->get('lebar_punggung');
        $new_clothes->lebar_lengan = $request->get('lebar_lengan');
        $new_clothes->lebar_ban_lengan = $request->get('lebar_ban_lengan');
        $new_clothes->panjang_punggung = $request->get('panjang_punggung');
        $new_clothes->panjang_muka = $request->get('panjang_muka');
        $new_clothes->panjang_baju = $request->get('panjang_baju');
        $new_clothes->panjang_lengan = $request->get('panjang_lengan');
        $new_clothes->panjang_rok = $request->get('panjang_rok');
        $new_clothes->panjang_celana = $request->get('panjang_celana');
        $new_clothes->panjang_krah = $request->get('panjang_krah');

        $new_clothes->save();
        return redirect()->route('baju.index')->with('status', 'ANDA TELAH MENAMBAHKAN PESANAN');
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
        //
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
        //
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
