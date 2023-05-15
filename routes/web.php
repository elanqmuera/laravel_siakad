<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dosenController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\mahasiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::controller(AuthController::class)->group(function(){
//     Route::get('register','register')->name('register');
//     Route::post('register','registerSimpan')->name('register.simpan');

//     Route::get('login','login')->name('login');
//     Route::post('login','loginAksi')->name('login.aksi');
// });

Route::controller(dosenController::class)->group(function(){
    route::get('dosen', 'index')->name('dosen');
    Route::get('dosen/tambah','tambah')->name('dosen.tambah');
    Route::post('dosen','dosenSimpan')->name('dosen.simpan');
    Route::get('dosen/{id_dosen}/edit', 'edit')->name('dosen.edit');
    Route::post('dosen/{id_dosen}', 'update')->name('dosen.update');
    Route::get('dosen/{id_dosen}', 'hapus')->name('dosen.hapus');
});

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::controller(mahasiswaController::class)->group(function(){
    route::get('mahasiswa', 'index')->name('mahasiswa');
    Route::get('mahasiswa/tambah','tambah')->name('mahasiswa.tambah');
    Route::post('mahasiswa','simpan')->name('mahasiswa.simpan');
    Route::get('mahasiswa/{id_mahasiswa}/edit', 'edit')->name('mahasiswa.edit');
    Route::post('mahasiswa/{id_mahasiswa}', 'update')->name('mahasiswa.update');
    Route::get('mahasiswa/{id_mahasiswa}', 'hapus')->name('mahasiswa.hapus');
});

Route::controller(kelasController::class)->group(function(){ 
    route::get('kelas', 'index')->name('kelas');
    Route::get('kelas/tambah','tambah')->name('kelas.tambah');
    Route::post('kelas','simpan')->name('kelas.simpan');
    Route::get('kelas/{id_kelas}/edit', 'edit')->name('kelas.edit');
    Route::post('kelas/{id_kelas}', 'update')->name('kelas.update');
    Route::get('kelas/{id_kelas}', 'hapus')->name('kelas.hapus');
});



