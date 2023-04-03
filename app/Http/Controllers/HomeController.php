<?php

namespace App\Http\Controllers;

use App\Models\history;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $lelang = Lelang::with('barang', 'historyLelang')->where('Status', 'dibuka')->get();
        // $lelang = lelang::where('id_lelang', $id)->orderBy('created_at', 'desc')->get();
        $history = history::all();
        return view('/layout1/main', [
            'lelang' => $lelang,
            'history' => $history
        ]);
    }
}
