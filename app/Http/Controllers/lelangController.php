<?php

namespace App\Http\Controllers;

use App\Exports\LelangExport;
use App\Models\barang;
use App\Models\history;
use App\Models\lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class lelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = lelang::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = lelang::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('lelang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lelang.create', [
            'barang' => barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id_barang' => $request->id_barang,
            'Tanggal_Lelang' => date('d m Y'),
            'Status' => 'dibuka',
        ];


        // dd($validatedData);
        lelang::create($data);
        return redirect()->to('lelang')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lelang = lelang::where('id', $id)->firstOrFail();
        $idPemenang = $lelang->id_user != null ? $lelang->id_user : 0;

        return view('lelang.show', [
            'lelang' => $lelang,
            'history' => history::where('id_lelang', $id)->get(),
            'idPemenang' => $idPemenang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = lelang::where('id', $id)->first();
        return view('lelang.edit')->with('data', $data);
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
        $request->validate([
            'Nama_Barang' => 'required',
            // 'username' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            // 'username.required' => 'useranme wajib diisi',
        ]);
        lelang::where('id', $id)->update([
            'Nama_Barang' => $request->nama,
        ]);
        return redirect()->to('lelang')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lelang::where('id', $id)->delete();
        return redirect()->to('lelang')->with('success', 'Berhasil melakukan delete data');
    }

    public function export()
    {
        return Excel::download(new LelangExport, 'Lelang.xlsx');
    }
}
