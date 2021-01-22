<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $pages = Product::paginate(10);   

        return view('pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            "product_name" => "required|min:1|max:30",
            "deskripsi" => "required|min:1|max:100",
            "tampak_depan" => "required|dimensions:min_width=280,min_height=280,max_width=290,max_height=360",
            "tampak_belakang" => "required|dimensions:min_width=280,min_height=280,max_width=290,max_height=360",
            "price" => "required|min:1|max:10",
            ])->validate();

        $new_product = new Product;
        $new_product->product_name = ucfirst($request->get('product_name'));
        $new_product->deskripsi = ucfirst($request->get('deskripsi'));
        if($request->file('tampak_depan')){
            $file = $request->file('tampak_depan')->store('tampak_depan', 'public');
            $new_product->tampak_depan = $file;
           }
        if($request->file('tampak_belakang')){
            $file = $request->file('tampak_belakang')->store('tampak_belakang', 'public');
            $new_product->tampak_belakang = $file;
           }

        $new_product->price = $request->get('price');
        $new_product->save();
        return redirect()->route('pages.index')->with('status', 'Create New Product Success!!');
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

        return view('galeri.show', ['galeri' => $galeri]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Product::findOrFail($id);   

        return view('pages.update', ['pages' => $pages]);
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
            "product_name" => "required|min:1|max:30",
            "deskripsi" => "min:1|max:100",
            "tampak_depan" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            "tampak_belakang" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            "price" => "min:1|max:10",
            ])->validate();

        $product = Product::findOrFail($id);
        $product->product_name = ucfirst($request->get('product_name'));
        $product->deskripsi = ucfirst($request->get('deskripsi'));
        if($product->tampak_depan && file_exists(storage_path('app/public/' . $product->tampak_depan))){
            \Storage::delete('public/'.$product->tampak_depan);
            $file = $request->file('tampak_depan')->store('tampak_depan', 'public');
            $product->tampak_depan = $file;
           }
        if($product->tampak_belakang && file_exists(storage_path('app/public/' . $product->tampak_belakang))){
            \Storage::delete('public/'.$product->tampak_belakang);
            $file = $request->file('tampak_belakang')->store('tampak_belakang', 'public');
            $product->tampak_belakang = $file;
           }

        $product->price = $request->get('price');
        $product->save();
        return redirect()->route('pages.index')->with('status', 'Update Data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('pages.index')->with('statusdel', 'Data Berhasil Dihapus');
    }
}
