<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
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
        $suggestions = Suggestion::latest()->paginate(5);

        return view('suggestion.index', ['suggestions' => $suggestions]);
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
        \Validator::make($request->all(),[
            "first_name" => "min:1|max:30",
            // "ne" => "min:6|max:20",
            "suggestion" => "min:1|max:3000",
            "rating" => "required",
            ])->validate();

        $new_rating = new Suggestion;

        $new_rating->name = $request->get('name');
        $pho = $request->get('pho');
        $ne = $request->get('ne');
        $phone = $pho.$ne;
        $new_rating->phone = $phone;
        $new_rating->suggestion = $request->get('suggestion');
        $new_rating->rating = $request->get('rating');

        $new_rating->save();
        return redirect()->route('galeri.index')->with('status', 'Tanggapan Anda Sudah Dikirim');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rating = Suggestion::findOrFail($id);

        return view('suggestion.show', ['rating' => $rating]);
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
        $table = Suggestion::findOrFail($id);

        $table->delete();
        return redirect()->route('dasboard.index')->with('statusdel', 'Data Berhasil Dihapus');
    }
}
