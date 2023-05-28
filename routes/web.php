<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\tugasController;
use App\Http\Controllers\matkulController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\pertemuanController;
use App\Http\Controllers\tahunajaranController;
use App\Http\Controllers\tugasmahasiswaController;

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
// Route::middleware('auth')->group(function(){

// });

Route::controller(LoginController::class)->group(function () {
    route::get('/', 'index')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('login', 'proses');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('dashboard', 'dashboard')->name('dashboard');
});



Route::controller(dosenController::class)->group(function () {
    route::get('dosen', 'index')->name('dosen');
    Route::get('dosen/tambah', 'tambah')->name('dosen.tambah');
    Route::post('dosen', 'dosenSimpan')->name('dosen.simpan');
    Route::get('dosen/{id_dosen}/edit', 'edit')->name('dosen.edit');
    Route::post('dosen/{id_dosen}', 'update')->name('dosen.update');
    Route::get('dosen/{id_dosen}', 'hapus')->name('dosen.hapus');
    Route::get('dosen/buat-tugas', 'buatTugas')->name('buat_tugas');
});

Route::controller(matkulController::class)->group(function () {
    route::get('matkul', 'index')->name('matkul');
    Route::get('matkul/tambah', 'tambah')->name('matkul.tambah');
    Route::post('matkul', 'simpan')->name('matkul.simpan');
    Route::get('matkul/{id}/edit', 'edit')->name('matkul.edit');
    Route::post('matkul/{id}', 'update')->name('matkul.update');
    Route::get('matkul/{id}', 'hapus')->name('matkul.hapus');
    Route::get('matkul/detail/{id}', 'detail')->name('matkul.detail');
});

// Route::get('/dashboard', function(){
//     return view('admin.dashboard');
// })->name('dashboard');


Route::controller(jurusanController::class)->group(function () {
    route::get('jurusan', 'index')->name('jurusan');
    Route::get('jurusan/tambah', 'tambah')->name('jurusan.tambah');
    Route::post('jurusan', 'simpan')->name('jurusan.simpan');
    Route::get('jurusan/{id}/edit', 'edit')->name('jurusan.edit');
    Route::post('jurusan/{id}', 'update')->name('jurusan.update');
    Route::get('jurusan/{id}', 'hapus')->name('jurusan.hapus');
});


Route::controller(mahasiswaController::class)->group(function () {
    route::get('mahasiswa', 'index')->name('mahasiswa');
    Route::get('mahasiswa/tambah', 'tambah')->name('mahasiswa.tambah');
    Route::post('mahasiswa', 'simpan')->name('mahasiswa.simpan');
    Route::get('mahasiswa/{id_mahasiswa}/edit', 'edit')->name('mahasiswa.edit');
    Route::post('mahasiswa/{id_mahasiswa}', 'update')->name('mahasiswa.update');
    Route::get('mahasiswa/{id_mahasiswa}', 'hapus')->name('mahasiswa.hapus');
});

Route::controller(kelasController::class)->group(function () {
    route::get('kelas', 'index')->name('kelas');
    route::get('kelas/detail/{id_kelas}', 'detail')->name('kelas.detail');
    Route::get('kelas/tambah', 'tambah')->name('kelas.tambah');
    Route::post('kelas', 'simpan')->name('kelas.simpan');
    Route::get('kelas/{id_kelas}/edit', 'edit')->name('kelas.edit');
    Route::post('kelas/{id_kelas}', 'update')->name('kelas.update');
    Route::get('kelas/{id_kelas}', 'hapus')->name('kelas.hapus');
});

Route::controller(pertemuanController::class)->group(function () {
    route::get('pertemuan', 'index')->name('pertemuan');
    route::get('pertemuan/lihat/{id_pertemuan}', 'lihat')->name('pertemuan.lihat');
    Route::get('pertemuan/tambah', 'tambah')->name('pertemuan.tambah');
    Route::post('pertemuan', 'simpan')->name('pertemuan.simpan');
    Route::get('pertemuan/{id_pertemuan}/edit', 'edit')->name('pertemuan.edit');
    Route::post('pertemuan/{id_pertemuan}', 'update')->name('pertemuan.update');
    Route::get('pertemuan/{id_pertemuan}', 'hapus')->name('pertemuan.hapus');
});

Route::controller(tahunajaranController::class)->group(function () {
    route::get('tahunajaran', 'index')->name('tahunajaran');
    Route::get('tahunajaran/tambah', 'tambah')->name('tahunajaran.tambah');
    Route::post('tahunajaran', 'simpan')->name('tahunajaran.simpan');
    Route::get('tahunajaran/{id_tahunajaran}/edit', 'edit')->name('tahunajaran.edit');
    Route::post('tahunajaran/{id_tahunajaran}', 'update')->name('tahunajaran.update');
    Route::get('tahunajaran/{id_tahunajaran}', 'hapus')->name('tahunajaran.hapus');
});

Route::controller(tugasController::class)->group(function () {
    route::get('tugas', 'index')->name('tugas');
    route::get('tugas/lihat/{id_tugas}', 'lihat')->name('tugas.lihat');
    Route::get('tugas/tambah', 'tambah')->name('tugas.tambah');
    Route::post('tugas', 'simpan')->name('tugas.simpan');
    Route::get('tugas/{id_tugas}/edit', 'edit')->name('tugas.edit');
    Route::post('tugas/{id_tugas}', 'update')->name('tugas.update');
    Route::get('tugas/{id_tugas}', 'hapus')->name('tugas.hapus');
});

Route::controller(nilaiController::class)->group(function () {
    route::get('nilai', 'index')->name('nilai');
    route::get('nilai/lihat/{id_nilai}', 'lihat')->name('nilai.lihat');
    Route::get('nilai/tambah', 'tambah')->name('nilai.tambah');
    Route::post('nilai', 'simpan')->name('nilai.simpan');
    Route::get('nilai/{id_nilai}/edit', 'edit')->name('nilai.edit');
    Route::post('nilai/{id_nilai}', 'update')->name('nilai.update');
    Route::get('nilai/{id_nilai}', 'hapus')->name('nilai.hapus');
});

Route::controller(tugasmahasiswaController::class)->group(function () {
    route::get('tugasMahasiswa', 'index')->name('tugasMahasiswa');
    Route::get('tugasMahasiswa/tambah', 'tambah')->name('tugasMahasiswa.tambah');
    Route::post('tugasMahasiswa', 'simpan')->name('tugasMahasiswa.simpan');
    Route::get('tugasMahasiswa/{id_tugasmahasiswa}/edit', 'edit')->name('tugasMahasiswa.edit');
    Route::post('tugasMahasiswa/{id_tugasmahasiswa}', 'update')->name('tugasMahasiswa.update');
    Route::get('tugasMahasiswa/{id_tugasmahasiswa}', 'hapus')->name('tugasMahasiswa.hapus');
});
