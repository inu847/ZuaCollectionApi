<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();

        return view('galeri.index', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $new_clothes = new \App\Models\Baju;
        // $new_clothes->title = ucfirst($request->get('first_name'));
        // $new_clothes->kategori = ($request->get('last_name'));
        // $new_clothes->status = ($request->get('gender'));
        // $new_clothes->jenis_ukuran = ($request->get('birth'));
        // $new_clothes->lingkar_badan = $request->get('kategori');
        // $new_clothes->lingkar_pinggang = $request->get('many_price');
        // $new_clothes->lingkar_pinggul = $request->get('address1');
        // $new_clothes->lingkar_pipa = $request->get('address2');
        // $new_clothes->lingkar_paha = $request->get('city');
        // $new_clothes->lingkar_lutut = $request->get('state');
        // $new_clothes->lebar_muka = $request->get('post_code');
        // $new_clothes->lebar_punggung = $request->get('country');

        // $new_clothes->save();
        // return redirect()->route('baju.update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galeri = Product::findOrFail($id);
        $products = Product::paginate(3);

        return view('galeri.show', ['galeri' => $galeri,
                                    'products' => $products]);
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
