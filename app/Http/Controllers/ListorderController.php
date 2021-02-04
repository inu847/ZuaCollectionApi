<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Gate;

class ListorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
        $this->middleware(function($request, $next){

        if(Gate::allows('manage-order')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        $table = Checkout::latest()->paginate(10);
        $filterKeyword = $request->get('keyword');
        $status = $request->get('status');
        
        if($status){
            $table = Checkout::where('status', $status)->paginate(10);
        }

        if($filterKeyword){
            $table = Checkout::where('first_name', 'LIKE', "%$filterKeyword%")->paginate(10);

            if($status){
                $table = Checkout::where('first_name', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(10);
            } else {
                $table = Checkout::where('first_name', 'LIKE', "%$filterKeyword%")->paginate(10);
                }
           }

        return view('listorder.index', ['table' => $table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
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
        $baju = Checkout::findOrFail($id);

        return view('listorder.show', ['baju' => $baju]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Checkout::findOrFail($id);

        return view('listorder.update', ['product' => $product]);
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
    public function destroy(Request $request, $id)
    {
        $product = Checkout::findOrFail($id);

        $product->delete();
        return redirect()->route('listorder.index')->with('statusdel', 'Data Berhasil Dihapus');
    }

    public function pesanan(Request $request, $id)
    {
        \Validator::make($request->all(),[
            "first_name" => "min:1|max:30",
            "last_name" => "min:1|max:30",
            "gender" => "required",
            "birth" => "min:1|max:10",
            "product_name" => "min:1|max:200",
            "product" => "min:1|max:100",
            "price" => "min:1|max:20",
            "address" => "min:1|max:50",
            "rt" => "min:1|max:5",
            "rw" => "min:1|max:5",
            "phone" => "min:6|max:20",
            "city" => "min:1|max:100",
            "state" => "min:1|max:100",
            "post_code" => "min:1|max:20",
            "country" => "min:1|max:100",
            "status" => "required",
            ])->validate();

        $product = Checkout::findOrFail($id);

        $product->first_name = ucfirst($request->get('first_name'));
        $product->last_name = $request->get('last_name');
        $product->gender = $request->get('gender');
        $product->birth = $request->get('birth');
        $product->product_name = $request->get('product_name');
        $product->price = $request->get('price');

        $product->address = $request->get('address');
        $product->rt = $request->get('rt');
        $product->rw = $request->get('rw');
        $product->phone = $request->get('phone');
        $product->city = $request->get('city');
        $product->state = $request->get('state');
        $product->post_code = $request->get('post_code');
        $product->country = $request->get('country');
        $product->status = $request->get('status');

        $product->save();
        return redirect()->route('listorder.index')->with('status', 'Update Success!!');
    }
}
