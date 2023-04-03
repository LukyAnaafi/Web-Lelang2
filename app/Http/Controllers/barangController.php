<?php

namespace App\Http\Controllers;


use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class barangController extends Controller
{


    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = barang::where('No', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('Tanggal_Awal', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = barang::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Session::flash('id', $request->id);
        Session::flash('nama', $request->nama);
        Session::flash('Tanggal_Upload', $request->Tanggal_Upload);
        Session::flash('deskripsi', $request->deskripsi);
        Session::flash('Harga_Awal', $request->Harga_Awal);



        $validatedData = $request->validate([

            'nama' => 'required',
            'Tanggal_Upload' => 'required',
            'Harga_Awal' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:10000'

        ], [

            'nama.required' => 'id wajib diisi',
            'Tanggal_Upload.required' => 'tanggal wajib diisi',



        ]);



        $validatedData['foto'] = $request->file('foto')->store('barang-image');

        barang::create($validatedData);
        return redirect()->to('barang')->with('success', 'Berhasil menambahkan data');
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
        $data = barang::where('id', $id)->first();
        return view('barang.edit')->with('data', $data);
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
            'nama' => 'required',
            // 'username' => 'required',
        ], [
            'nama.required' => 'Nama wajib diisi',
            // 'username.required' => 'useranme wajib diisi',
        ]);
        barang::where('id', $id)->update([
            'nama' => $request->nama,
            'Tanggal_update' => $request->Tanggal_update,
            'Harga_Awal' => $request->Harga_Awal,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->to('barang')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang::where('id', $id)->delete();
        return redirect()->to('barang')->with('success', 'Berhasil melakukan delete data');
    }
}
