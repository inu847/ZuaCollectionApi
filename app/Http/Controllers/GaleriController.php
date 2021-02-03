<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::latest()->paginate(10);
        $filterKeyword = $request->get('keyword');
        $price = $request->get('price');

        if($price){
            if($price==99000){
                $product = Product::where('price', '<', '100000')->paginate(10);
            }elseif($price==100000){
                $product = Product::where('price', '>=', '100000')->where('price', '<', '200000')->paginate(10);
            }elseif($price==200000){
                $product = Product::where('price', '>=', '200000')->where('price', '<', '500000')->paginate(10);
            }elseif($price==500000){
                $product = Product::where('price', '>=', '500000')->where('price', '<', '1000000')->paginate(10);
            }elseif($price==1000000){
                $product = Product::where('price', '>=', '1000000')->paginate(10);
            }else{
                $product = Product::paginate(10);
            }
        }

        if($filterKeyword){
            $product = Product::where('product_name', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

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
        $new_product = new Checkout;
        $new_product->first_name = ucfirst($request->get('first_name'));
        $new_product->last_name = $request->get('last_name');
        $new_product->gender = $request->get('gender');
        $new_product->birth = $request->get('birth');
        $new_product->product_name = $request->get('product_name');
        $product = $request->get('product');
        $price = $request->get('price');
        $total = $product*$price;
        $new_product->price = $total;

        $new_product->address = $request->get('address');
        $new_product->rt = $request->get('rt');
        $new_product->rw = $request->get('rw');
        $pho = $request->get('pho');
        $ne = $request->get('ne');
        $phone = $pho.$ne;
        $new_product->phone = $phone;
        $new_product->city = $request->get('city');
        $new_product->state = $request->get('state');
        $new_product->post_code = $request->get('post_code');
        $new_product->country = $request->get('country');
        $new_product->status = $request->get('status');

        if($request->file('product')){
            $file = $request->file('product')->store('products', 'public');
            $new_product->product = $file;
           }

        $new_product->save();
        return redirect()->route('galeri.index')->with('status', 'Checkout Success!!');
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
        $product = Product::findOrFail($id);

        return view('galeri.create', ['product' => $product]);
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
        $new_product = Checkout::findOrFail($id);
        $new_product->first_name = ucfirst($request->get('first_name'));
        $new_product->last_name = $request->get('last_name');
        $new_product->gender = $request->get('gender');
        $new_product->birth = $request->get('birth');
        $new_product->product_name = $request->get('product_name');
        $new_product->price = $request->get('price');

        $new_product->address = $request->get('address');
        $new_product->rt = $request->get('rt');
        $new_product->rw = $request->get('rw');
        $new_product->phone = $request->get('phone');
        $new_product->city = $request->get('city');
        $new_product->state = $request->get('state');
        $new_product->post_code = $request->get('post_code');
        $new_product->country = $request->get('country');
        $new_product->status = $request->get('status');

        if($request->file('product')){
            $file = $request->file('product')->store('products', 'public');
            $new_product->product = $file;
           }

        $new_product->save();
        return redirect()->route('galeri.index')->with('status', 'Checkout Success!!');
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
