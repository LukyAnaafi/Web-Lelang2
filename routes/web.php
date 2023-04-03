<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\lelangController;
use App\Http\Controllers\tawarController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\HomeController;
use App\Models\barang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('/layout/main');
});
Route::get('/user', [HomeController::class, 'index']);
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'login']);
Route::get('/login/logout', [LoginController::class, 'logout']);

Route::get('/login/Register', [LoginController::class, 'register']);
Route::post('/login/create', [LoginController::class, 'create']);

Route::get('/petugas', [petugasController::class, 'index']);
Route::post('/petugas', [petugasController::class, 'store']);
Route::resource('petugas', petugasController::class);

Route::get('/masyarakat', [masyarakatController::class, 'index']);
Route::post('/masyarakat', [masyarakatController::class, 'store']);
Route::resource('masyarakat', masyarakatController::class);

Route::get('/barang', [barangController::class, 'index']);
Route::post('/barang', [barangController::class, 'store']);
Route::resource('barang', barangController::class);

Route::get('/lelang', [lelangController::class, 'index']);
Route::post('/lelang', [lelangController::class, 'store']);
Route::resource('lelang', lelangController::class);
Route::post('/lelang/export', [lelangController::class, 'export']);

Route::post('/penawaran/{idLelang}/barang/{idBarang}', [tawarController::class, 'penawaran']);

Route::get('/history', [tawarController::class, 'index']);
Route::post('/history', [tawarController::class, 'history']);

Route::get('/winner/{idLelang}/history/{idHistory}', [historyController::class, 'winner']);
