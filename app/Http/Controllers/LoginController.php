<?php

namespace App\Http\Controllers;

use App\Models\masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    function index()
    {
        return view("login/index");
    }
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username' => 'Username wajib diisi',
            'password' => 'Pasword wajib diisi',
        ]);
        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if ($request->role == 'user') {
            if (Auth::guard('masyarakat')->attempt($infologin)) {
                return redirect('/user');
            }
        } else {
            if (Auth::guard('petugas')->attempt($infologin)) {
                return redirect('/home');
            }
        }

        return redirect()->back()->withErrors('Username dan Password salah');
    }
    function logout()
    {
        if (Auth::guard('masyarakat')->check()) {
            Auth::guard('masyarakat')->logout();
        }

        if (Auth::guard('petugas')->check()) {
            Auth::guard('petugas')->logout();
        }
        return redirect('/')->with('success', 'Berhasil Logout');
    }
    function register()
    {
        return view('login/Register');
    }
    function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:tb_masyarakat_15459',
            'password' => 'required|min:6',
            'No_Telepon' => 'required'
        ], [
            'nama' => 'Nama wajib diisi',
            'username' => 'Username wajib diisi',
            'username.unique' => 'Username sudah digunakan, silakan masukkan Username yang lain',
            'password' => 'Password wajib diisi',
            'password.min' => 'Pasword harus lebih dari 6',
        ]);


        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'No_Telepon' => $request->No_Telepon,
            'password' => Hash::make($request->password)
        ];
        $newMasyarakat = masyarakat::create($data);

        return redirect('')->with('success', "Berhasil Membuat Akun");
    }
}
