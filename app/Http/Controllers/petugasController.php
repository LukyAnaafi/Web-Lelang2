<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class petugasController extends Controller
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
            $data = petugas::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = petugas::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('petugas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create', [
            'levels' => Level::latest()->get()
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
        // Session::flash('id', $request->id);
        Session::flash('nama', $request->nama);
        Session::flash('username', $request->tanggal);
        Session::flash('password', $request->tanggal);
        Session::flash('level', $request->Harga_awal);
       


        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            

        ], [
            // 'id.required' => 'id wajib diisi',
            // 'id.numeric' => 'id wajib dalam angka',
            // 'id.unique' => 'id yang diisikan sudah ada dalam database',
            'nama.required' => 'id wajib diisi',
            'username.required' => 'tanggal wajib diisi',



        ]);

        
        $validatedData['password']= Hash::make($request->password);
        petugas::create($validatedData);
        return redirect()->to('petugas')->with('success', 'Berhasil menambahkan data');
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
        $data = petugas::where('id', $id)->first();
        return view('petugas.edit')->with('data', $data);
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
        petugas::where('id', $id)->update([
            'nama' => $request->nama,
        ]);
        return redirect()->to('petugas')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        petugas::where('id', $id)->delete();
        return redirect()->to('petugas')->with('success', 'Berhasil melakukan delete data');
    }
}
