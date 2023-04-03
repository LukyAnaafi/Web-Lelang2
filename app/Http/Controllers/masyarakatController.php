<?php

namespace App\Http\Controllers;


use App\Models\masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class masyarakatController extends Controller
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
            $data = masyarakat::where('id', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('username', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = masyarakat::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('masyarakat.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
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
        Session::flash('username', $request->username);
        Session::flash('No_Telepon', $request->No_Telepon);
       


        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'No_Telepon' => 'required',
            

        ], [
            // 'id.required' => 'id wajib diisi',
            // 'id.numeric' => 'id wajib dalam angka',
            // 'id.unique' => 'id yang diisikan sudah ada dalam database',
            'nama.required' => 'nama wajib diisi',
            'username.required' => 'username wajib diisi',



        ]);

       
        // dd($validatedData);
        masyarakat::create($validatedData);
        return redirect()->to('masyarakat')->with('success', 'Berhasil menambahkan data');
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
        $data = masyarakat::where('id', $id)->first();
        return view('masyarakat.edit')->with('data', $data);
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
            'username' => 'required',
            'No_Telepon'=>'required'
        ], [
            'nama.required' => 'Nama wajib diisi',
             'username.required' => 'useranme wajib diisi',
             'No_Telepon.required' => 'No Telepon wajib diisi',
        ]);
        masyarakat::where('id', $id)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'No_Telepon' => $request->No_Telepon,
        ]);
        return redirect()->to('masyarakat')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        masyarakat::where('id', $id)->delete();
        return redirect()->to('masyarakat')->with('success', 'Berhasil melakukan delete data');
    }
}
