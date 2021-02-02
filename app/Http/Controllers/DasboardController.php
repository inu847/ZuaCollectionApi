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
        $users = \App\Models\User::latest()->paginate(10);
        $suggestion = \App\Models\Suggestion::paginate(5);
        $complain = \App\Models\Suggestion::count('suggestion');
        // earning
        $persen = Baju::sum('invoice');
        $persen1 = $persen;
        // target earning
        if($persen>0){
            $bagi = 1000000 / $persen1;
            // menghitung persen
            $target = 100 / $bagi;
            $hasil = round($target);
        }
        if($persen1==0){
            $hasil = 0;
        }
        // dd($hasil);
        
        // pending
        $proses = Baju::where('status', 'PROCESS')->count();
        $proses1 = $proses;
        // target pending
        if($proses>0){
            $bagiProsess = 50 / $proses1;
            // menghitung persen
            $targetProses = 100 / $bagiProsess;
            $hasilProses = round($targetProses);
        }else if($proses==0){
            $hasilProses = 0;
        }
        // booking
        $booking = Baju::count();
        $booking1 = $booking;
        // target booking
        if($booking1>0){
            $bagiBooking = 50 / $booking1;
            // menghitung persen
            $targetBooking = 100 / $bagiBooking;
            $hasilBooking = round($targetBooking);
        }else if($booking1==0){
            $hasilBooking = 0;
        }
        
        return view('dasboard.index', [ 
                                        'hasil' => $hasil, 
                                        'hasilProses' => $hasilProses, 
                                        'hasilBooking' => $hasilBooking,
                                        'users' => $users,
                                        'complain' => $complain,
                                        'suggestion' => $suggestion,
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
