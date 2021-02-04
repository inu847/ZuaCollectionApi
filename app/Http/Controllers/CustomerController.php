<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'address' => 'required|min:4|max:25',
            'ne' => 'required|min:8|max:15',
            'email' => 'required|min:7|max:25',
            'password' => 'required|min:8|max:20'
        ])->validate();

        $new_user = new User;
        $new_user->name = $request->get('name');
        $new_user->roles = 'CUSTOMER';
        $new_user->address = $request->get('address');
        $pho = $request->get('pho');
        $ne = $request->get('ne');
        $phone = $pho.$ne;
        $new_user->phone = $phone;
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return redirect()->route('galeri.index')->with('status', 'Create Akun Success!!');
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
