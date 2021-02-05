<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $complain = \App\Models\Suggestion::count('suggestion');
        $suggestion = \App\Models\Suggestion::latest()->paginate(2);
        
        return view('dasboard.index', ['complain', $complain],
                                      ['suggestion', $suggestion]);
    }
}
