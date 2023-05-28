<?php

namespace App\Http\Controllers;

use App\Models\ModelJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class jurusanController extends Controller
{
   public function index() {
    $modelJurusan = new ModelJurusan();
    $jurusan = $modelJurusan->dataJurusan();

    return view('jurusan.index', ['jurusan' => $jurusan]);
   }

   public function tambah() {
    return view('jurusan.tambah');
   }

   public function simpan(Request $request){
    Validator::make($request->all(), [
        'id_jurusan'=> 'required|unique:jurusan,id_jurusan',
            'nama_jurusan'=>'required|',
    ],
    
        [
            'id_jurusan.required' => 'Kolom kode jurusan harus diisi.',
            'id_jurusan.unique' => 'kode jurusan sudah terdaftar.',
            'nama_jurusan.required' => 'Kolom nama harus diisi.'
    ])->validate();
    
    $id_jurusan = $request->input('id_jurusan');
    $nama_jurusan = $request->input('nama_jurusan');

    DB::table('jurusan')->insert([
        'id_jurusan' => $id_jurusan,
        'nama_jurusan' => $nama_jurusan,
    ]);
   
    $modelJurusan = new ModelJurusan();
    $jurusan = $modelJurusan->dataJurusan();

    return view('jurusan.index', ['jurusan' => $jurusan]);
 
}
public function edit($id){
    $jurusan = DB::select('select * from jurusan where id ='.$id);
    return view('jurusan.edit',['jurusan' => $jurusan]);
}

public function update(Request $request, $id){
   
 
    $id_jurusan = $request->input('id_jurusan');
    $nama_jurusan = $request->input('nama_jurusan');


    DB::update("UPDATE jurusan SET id_jurusan='$id_jurusan',nama_jurusan='$nama_jurusan'  WHERE id='$id'");

    return redirect()->route('jurusan');
}
public function hapus($id){
    DB::delete('delete from jurusan where id ='.$id);
    return redirect()->route('jurusan')->with('success','Data jurusan berhasil dihapus');
}

}


