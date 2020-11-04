<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Baju;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pages = \App\Models\Baju::paginate(10);
        $filterKeyword = $request->get('title');
        $status = $request->get('status');

        if($filterKeyword){
            $pages = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%");
            if($status){
                $pages = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%")
                ->where('status', $status)
                ->paginate(10);
                } else {
                $pages = \App\Models\Baju::where('title', 'LIKE', "%$filterKeyword%")
                ->paginate(10);
                }
           }

           if($status){
                $pages = \App\Models\Baju::where('status', $status)->paginate(10);
            } else {
                $pages = \App\Models\Baju::paginate(10);
           }   

        return view('pages.index', ['pages' => $pages]);
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
