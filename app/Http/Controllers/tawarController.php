<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tawarController extends Controller
{
    public function penawaran(Request $request, $idLelang, $idBarang)
    {
        history::create([
            'id_lelang' => $idLelang,
            'id_barang' => $idBarang,
            'penawaran_harga' => $request->penawaran,
            'id_user' => Auth::guard('masyarakat')->user()->id,
        ]);
        return redirect()->back();
    }
}
