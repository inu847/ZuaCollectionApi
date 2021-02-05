<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Baju;

class BajuController extends Controller
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


    public function index(Request $request) {

        $table = Baju::latest()->paginate(10);
        $filterKeyword = $request->get('keyword');
        $status = $request->get('status');
        
        if($status){
            $table = Baju::where('status', $status)->paginate(10);
        }

        if($filterKeyword){
            $table = Baju::where('title', 'LIKE', "%$filterKeyword%")->paginate(10);
            if($status){
                $table = Baju::where('title', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(10);
            } else {
                $table = Baju::where('title', 'LIKE', "%$filterKeyword%")->paginate(10);
                }
           }

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
        Validator::make($request->all(),[
            "name" => "required|min:1|max:30",
            "kategori" => "min:1|max:20",
            "jenis_ukuran" => "min:1|max:20",
            "avatar" => 'file|image|max:2048',
            ])->validate();

        $new_clothes = new Baju;
        $new_clothes->title = ucfirst($request->get('name'));
        $new_clothes->kategori = $request->get('kategori');
        $new_clothes->status = 'PROCESS';
        $new_clothes->jenis_ukuran = $request->get('jenis_ukuran');
        $new_clothes->lingkar_badan = $request->get('lingkar_badan');
        $new_clothes->lingkar_pinggang = $request->get('lingkar_pinggang');
        $new_clothes->lingkar_pinggul = $request->get('lingkar_pinggul');
        $new_clothes->lingkar_pipa = $request->get('lingkar_pipa');
        $new_clothes->lingkar_paha = $request->get('lingkar_paha');
        $new_clothes->lingkar_lutut = $request->get('lingkar_lutut');
        $new_clothes->lebar_muka = $request->get('lebar_muka');
        $new_clothes->lebar_punggung = $request->get('lebar_punggung');
        $new_clothes->lebar_lengan = $request->get('lebar_punggung');
        $new_clothes->lebar_ban_lengan = $request->get('lebar_ban_lengan');
        $new_clothes->panjang_punggung = $request->get('panjang_punggung');
        $new_clothes->panjang_muka = $request->get('panjang_muka');
        $new_clothes->panjang_baju = $request->get('panjang_baju');
        $new_clothes->panjang_lengan = $request->get('panjang_lengan');
        $new_clothes->panjang_rok = $request->get('panjang_rok');
        $new_clothes->panjang_celana = $request->get('panjang_celana');
        $new_clothes->panjang_krah = $request->get('panjang_krah');

        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            $new_clothes->avatar = $file;
        }

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
        $baju = Baju::findOrFail($id);

        return view('baju.show', ['baju' => $baju]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baju = Baju::findOrFail($id);
        
        return view('baju.update', ['baju' => $baju]);
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
        $baju = Baju::findOrFail($id);
        
        Validator::make($request->all(),[
            "name" => "required|min:1|max:30",
            "kategori" => "min:1|max:20",
            "jenis_ukuran" => "min:1|max:20",
            "avatar" => 'file|image|max:2048',
            ])->validate();

        $baju->title = $request->get('name');
        $baju->kategori = $request->get('kategori');
        $baju->jenis_ukuran = $request->get('jenis_ukuran');
        $baju->status = $request->get('status');
        $baju->lingkar_badan = $request->get('lingkar_badan');
        $baju->lingkar_pinggang = $request->get('lingkar_pinggang');
        $baju->lingkar_pinggul = $request->get('lingkar_pinggul');
        $baju->lingkar_pipa = $request->get('lingkar_pipa');
        $baju->lingkar_paha = $request->get('lingkar_paha');
        $baju->lingkar_lutut = $request->get('lingkar_lutut');
        $baju->lebar_muka = $request->get('lebar_muka');
        $baju->lebar_punggung = $request->get('lebar_punggung');
        $baju->lebar_lengan = $request->get('lebar_lengan');
        $baju->lebar_ban_lengan = $request->get('lebar_ban_lengan');
        $baju->panjang_punggung = $request->get('panjang_punggung');
        $baju->panjang_muka = $request->get('panjang_muka');
        $baju->panjang_baju = $request->get('panjang_baju');
        $baju->panjang_lengan = $request->get('panjang_lengan');
        $baju->panjang_rok = $request->get('panjang_rok');
        $baju->panjang_celana = $request->get('panjang_celana');
        $baju->panjang_krah = $request->get('panjang_krah');
        
        if($request->file('avatar')){
            if($baju->avatar && file_exists(storage_path('app/public/' . $baju->avatar))){
                Storage::delete('public/'.$baju->avatar);
                $file = $request->file('avatar')->store('avatars', 'public');
                $baju->avatar = $file;
            }else{
                if($request->file('avatar')){
                    $file = $request->file('avatar')->store('avatars', 'public');
                    $baju->avatar = $file;
                }
            }
        }
               
        $baju->save();
        return redirect()->route('baju.index')->with('status', 'Update Data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = \App\Models\Baju::findOrFail($id);

        $table->delete();
        return redirect()->route('baju.index')->with('statusdel', 'Data Berhasil Dihapus');
    }
    
    public function invoice(Request $request, $id)
    {
        $order = Baju::findOrFail($id);

        Validator::make($request->all(),[
            "name" => "required|min:1|max:30",
            "kategori" => "min:1|max:20",
            "invoice" => "min:1|max:20",
            ])->validate();
        
        $order->title = $request->get('name');
        $order->kategori = $request->get('kategori');
        $order->status = 'SUCCESS';
        $order->invoice = $request->get('invoice');

        $order->save();
        return view('order.index', ['order' => $order]);
    }
}
