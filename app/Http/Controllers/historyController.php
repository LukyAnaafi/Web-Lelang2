<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\lelang;
use App\Models\Masyarakat;
use App\Models\Pemenang;
use Illuminate\Http\Request;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('history.index');
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


    public function winner($idLelang, $idHistory)
    {
        $lelang = lelang::where('id', $idLelang)->firstOrFail();
        $historyLelang = history::where('id', $idHistory)->firstOrFail();

        // dd($historyLelang);
        $lelang->update([
            'Status' => 'ditutup',
            'Harga_Akhir' => $historyLelang->penawaran_harga,
            'id_user' => $historyLelang->id_user,
        ]);

        Pemenang::create([
            'id_history' => $idLelang,
            'id_user' => $historyLelang->id_user
        ]);


        return redirect()->route('lelang.index');
    }
}
