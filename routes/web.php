<?php
use App\Http\Controllers\AlatController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MhsettingController;
use App\Http\Controllers\MhspinjamController;
use App\Http\Controllers\Page\PagesController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangpinjamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/page', [PagesController::class, 'index']);
Route::get('/sewa', [PagesController::class, 'fasilitas']);

Route::get('/', function () {
    return redirect('/page');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login_action'])->name('login');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/tambah/barang', [BarangController::class, 'create']);
    Route::post('/tambah/barang', [BarangController::class, 'store']);
    Route::get('/edit/{id}/barang', [BarangController::class, 'edit']);
    Route::post('/edit/{id}/barang', [BarangController::class, 'update']);
    Route::get('/hapus/{id}/barang', [BarangController::class, 'destroy']);

    // fasilitas
    Route::get('/fasilitas', [FasilitasController::class, 'index']);
    Route::get('/tambah/fasilitas', [FasilitasController::class, 'create']);
    Route::post('/tambah/fasilitas', [FasilitasController::class, 'store']);
    Route::get('/edit/{id}/fasilitas', [FasilitasController::class, 'edit']);
    Route::post('/edit/{id}/fasilitas', [FasilitasController::class, 'update']);
    Route::get('/hapus/{id}/fasilitas', [FasilitasController::class, 'destroy']);
    // jurusan
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::post('/jurusan', [JurusanController::class, 'tambah_action']);
    Route::post('/edit/{id}/jurusan', [JurusanController::class, 'edit_action']);
    Route::get('/hapus/{id}/jurusan', [JurusanController::class, 'hapus']);

    // peminjam admin
    Route::get('/pinjam', [PeminjamController::class, 'index']);
    Route::post('/peminjaman/{id}/konfirmasi', [PeminjamController::class, 'konfirmasi']);
    Route::get('/hapus/{id}/pinjam', [PeminjamController::class, 'destroy']);

    Route::get('/operator', [AdminController::class, 'index'])->name('operator');
    Route::post('/operator/tambah', [AdminController::class, 'store']);
    Route::post('/edit/{id}/operator', [AdminController::class, 'edit_action']);
    Route::get('/hapus/{id}/operator', [AdminController::class, 'destroy']);

    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::post('/edit/{id}/mahasiswa', [MahasiswaController::class, 'update']);
    Route::get('/hapus/{id}/mahasiswa', [MahasiswaController::class, 'destroy']);
});

// Hanya untuk MAHASISWA
Route::middleware(['mahasiswa'])->group(function () {
    // dashboard mahasiswa
    Route::get('/dashboard/mahasiswa', [DashboardController::class, 'dashboard_mhs']);

    // peminjam mahasiswa
    Route::get('/peminjam/mahasiswa', [MhspinjamController::class, 'index'])->name('/peminjam/mahasiswa');
    Route::post('/peminjam/tambah', [MhspinjamController::class, 'store']);
    Route::post('/edit/peminjam/{id}/mahasiswa', [MhspinjamController::class, 'update']);
    Route::post('/peminjam/{id}/pengajuan', [MhspinjamController::class, 'pengajuan']);

    // peminjam mahasiswa
    Route::get('/peminjam/barang', [BarangpinjamController::class, 'index'])->name('/peminjam/barang');
    Route::post('/peminjam/tambah/barang', [BarangpinjamController::class, 'store']);
    Route::post('/edit/peminjam/{id}/barang', [BarangpinjamController::class, 'update']);
    Route::post('/peminjam/{id}/pengajuan', [BarangpinjamController::class, 'pengajuan']);

    // setting Akun Mahasiswa
    Route::get('/setting', [MhsettingController::class, 'index']);
});

// Logout
Route::get('/logout', [LoginController::class, 'logout']);
