<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class ListorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $table = Checkout::paginate(10);
        $filterKeyword = $request->get('keyword');
        // $status = $request->get('status');
        
        // if($status){
        //     $table = Checkout::where('status', $status)->paginate(10);
        // } else {
        //     $table = Checkout::paginate(10);
        // }

        if($filterKeyword){
            $table = Checkout::where('first_name', 'LIKE', "%$filterKeyword%")->paginate(10);
            // if($status){
            //     $table = Checkout::where('status', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(10);
            //     } else {
            //     $table = Checkout::where('status', 'LIKE', "%$filterKeyword%")->paginate(10);
            //     }
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
