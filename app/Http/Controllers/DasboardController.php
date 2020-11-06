<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Baju;

class DasboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        
        $this->middleware('auth');
    }
    
    public function index()
    {
        $dash = Baju::get();

        // earning
        $persen = Baju::sum('invoice');
        $persen1 = $persen + 1;
        // target earning
        $bagi = 1000000 / $persen1;
        // menghitung persen
        $target = 100 / $bagi;
        $hasil = round($target);
        // dd($hasil);
        
        // pending
        $proses = Baju::where('status', 'PROCESS')->count();
        $proses1 = $proses + 1;
        // target pending
        $bagiProsess = 50 / $proses1;
        // menghitung persen
        $targetProses = 100 / $bagiProsess;
        $hasilProses = round($targetProses);
        
        // booking
        $booking = Baju::count();
        $booking1 = $booking + 1;
        // target booking
        $bagiBooking = 50 / $booking1;
        // menghitung persen
        $targetBooking = 100 / $bagiBooking;
        $hasilBooking = round($targetBooking);

        return view('dasboard.index', ['dasboard' => $dash, 
                                        'hasil' => $hasil, 
                                        'hasilProses' => $hasilProses, 
                                        'hasilBooking' => $hasilBooking
                                    ]);
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
