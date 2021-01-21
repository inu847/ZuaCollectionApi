<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Models\Product;

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
        $pages = \App\Models\Product::paginate(10);   

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
            "tampak_depan" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            "tampak_belakang" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            "deskripsi" => "min:1|max:4",
            "price" => "min:1|max:4",
            ])->validate();

        $new_product = new \App\Models\Product;
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
        $pages = \App\Models\Product::findOrFail($id);   

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
        $product = \App\Models\Product::findOrFail($id);

        $product->product_name = ucfirst($request->get('product_name'));
        $product->deskripsi = ucfirst($request->get('deskripsi'));
        if($product->tampak_depan && file_exists(storage_path('app/public/' . $product->tampak_depan))){
            \Storage::delete('public/'.$product->tampak_depan);
            $file = $request->file('tampak_depan')->store('avatars', 'public');
            $product->tampak_depan = $file;
           }
        if($product->tampak_belakang && file_exists(storage_path('app/public/' . $product->tampak_belakang))){
            \Storage::delete('public/'.$product->tampak_belakang);
            $file = $request->file('tampak_belakang')->store('avatars', 'public');
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
        $product = \App\Models\Product::findOrFail($id);

        $product->delete();
        return redirect()->route('pages.index')->with('statusdel', 'Data Berhasil Dihapus');
    }
}
