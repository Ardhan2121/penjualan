<?php

use App\Models\Sp;
use App\Models\Nota;
use App\Models\Barang;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('barang', BarangController::class);
});

Route::middleware(['auth', 'role:staff,admin'])->group(function(){
    Route::prefix('/transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/tanggal', [TransaksiController::class, 'getTanggal'])->name('transaksi.tanggal');
        Route::post('/create', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::post('pelanggan/cari/{id}', [TransaksiController::class, 'getPelanggan'])->name('transaksi.getPelanggan');
        Route::post('barang/cari/{id}', [TransaksiController::class, 'getBarang'])->name('transaksi.getBarang');
        Route::post('barang/tambah', [TransaksiController::class, 'setPesanan'])->name('transaksi.setBarang');
        Route::any('barang/hapus', [TransaksiController::class, 'hapusSemuaPesanan'])->name('transaksi.reset');
        Route::any('barang/hapus/{id}', [TransaksiController::class, 'hapusPesanan'])->name('transaksi.hapusBarang');
    });

    Route::prefix('/nota')->group(function () {
        Route::get('/', [NotaController::class, 'create'])->name('nota.create');
        Route::post('/store', [NotaController::class, 'store'])->name('nota.store');
        Route::get('/cetak/{id}', [NotaController::class, 'show'])->name('nota.show');
        Route::post('transaksi/cari/{id}', [NotaController::class, 'cariSp'])->name('nota.transaksi.cari');
    });

    Route::prefix('/laporan')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
        Route::any('/filter', [LaporanController::class, 'filter'])->name('laporan.filter');
    });

    Route::get('/', function () {
        $pelanggan = Pelanggan::all()->count();
        $barang = Barang::all()->count();
        $transaksi = Sp::all()->count();
        $nota = Nota::all()->count();
        $stoksedikit = Barang::where('2122091_Stok', '<', 10)->get();
        return view('dashboard', compact('pelanggan', 'barang', 'transaksi', 'nota', 'stoksedikit'));
    });

    Route::prefix('/user')->group(function(){
        Route::get('/create', [UserController::class,'create'])->name('user.create');
        Route::post('/store', [UserController::class,'store'])->name('user.store');
    });
});

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::any('dologin', [LoginController::class, 'login'])->name('login.doLogin')->middleware('guest');


Route::get('/testing',);
