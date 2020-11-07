<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
        return view('dasboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'roles' => 'required',
            'address' => 'required|min:4|max:25',
            'phone' => 'required|min:10|max:15',
            'email' => 'required|min:7|max:25',
            'password' => 'required|min:8|max:20'
        ])->validate();
        $new_user = new \App\Models\User;
        $new_user->name = $request->get('name');
        $new_user->roles = $request->get('roles');
        $new_user->address = $request->get('address');
        $new_user->phone = $request->get('phone');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return redirect()->route('dasboard.index')->with('status', 'Create Akun Success!!');
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
        $user = \App\Models\User::findOrFail($id);

        return view('user.edit', ['user' => $user]);
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
        \Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'address' => 'required|min:4|max:25',
            'phone' => 'required|min:10|max:15',
        ])->validate();

        $user = \App\Models\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->roles = $request->get('roles');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        
        $user->save();
        return redirect()->route('dasboard.index', [$id])->with('statusup', 'Update User Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);

        $user->delete();
        return redirect()->route('dasboard.index')->with('statusdel', 'User Berhasil Dihapus!!');
    }
}
