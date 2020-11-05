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
    public function index(Request $request) {

        $table = \App\Models\Baju::paginate(5);
        $filterKeyword = $request->get('title');
        $status = $request->get('status');
        
           

        if($filterKeyword){
            $table = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%");
            if($status){
                $table = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%")
                ->where('status', $status)
                ->paginate(5);
                } else {
                $table = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%")
                ->paginate(5);
                }
           }

           if($status){
                $table = \App\Models\Baju::where('status', $status)->paginate(5);
            } else {
                $table = \App\Models\Baju::paginate(5);
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
            "avatar" => "required"
            ])->validate();

        $new_clothes = new \App\Models\Baju;
        $new_clothes->title = $request->get('name');
        $new_clothes->kategori = ($request->get('kategori'));
        $new_clothes->status = ($request->get('status'));
        $new_clothes->jenis_ukuran = ($request->get('jenis_ukuran'));
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
        $new_clothes->invoice = $request->get('invoice');

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
        $baju = \App\Models\Baju::findOrFail($id);

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
        $baju = \App\Models\Baju::findOrFail($id);
        
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
            "avatar" => "required"
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
        
        
        

        $baju = \App\Models\Baju::findOrFail($id);

        $baju->title = $title;
        $baju->kategori = $kategori;
        $baju->jenis_ukuran = $jenis_ukuran;
        $baju->status = $status;
        $baju->lingkar_badan = $lingkar_badan;
        $baju->lingkar_pinggang = $lingkar_pinggang;
        $baju->lingkar_pinggul = $lingkar_pinggul;
        $baju->lingkar_pipa = $lingkar_pipa;
        $baju->lingkar_paha = $lingkar_paha;
        $baju->lingkar_lutut = $lingkar_lutut;
        $baju->lebar_muka = $lebar_muka;
        $baju->lebar_punggung = $lebar_punggung;
        $baju->lebar_lengan = $lebar_lengan;
        $baju->lebar_ban_lengan = $lebar_ban_lengan;
        $baju->panjang_punggung = $panjang_punggung;
        $baju->panjang_muka = $panjang_muka;
        $baju->panjang_baju = $panjang_baju;
        $baju->panjang_lengan = $panjang_lengan;
        $baju->panjang_rok = $panjang_rok;
        $baju->panjang_celana = $panjang_celana;
        $baju->panjang_krah = $panjang_krah;
        if($baju->avatar && file_exists(storage_path('app/public/' . $baju->avatar))){
            \Storage::delete('public/'.$baju->avatar);
            $file = $request->file('avatar')->store('avatars', 'public');
            $baju->avatar = $file;
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
        return redirect()->route('baju.index')->with('status', 'Data Berhasil Dihapus');
    }


}
