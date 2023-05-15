<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelKelas;
use Illuminate\Support\Facades\Validator;

class kelasController extends Controller
{
    public function index() {
       $modelKelas = new ModelKelas();

       $database = $modelKelas->dataKelas();
        return view('kelas.index', ['database' => $database]);
    }

    public function tambah() {
        return view('kelas.tambah');
    }

    public function simpan(Request $request){
    
        $nama_kelas = $request->input('nama_kelas');

        DB::insert("INSERT INTO kelas(nama_kelas) VALUES('$nama_kelas')");
        $database = DB::select('select * from kelas');
        return view('kelas.index', ['database' => $database]);
     
    }
    public function edit($id_kelas){
        $database = DB::select('select * from kelas where id_kelas ='.$id_kelas);
        return view('kelas.edit',['database' => $database]);
    }

    public function update(Request $request, $id_kelas){
        Validator::make($request->all(), [
            'id_kelas'=> 'unique:kelas,id_kelas',
            
        ],
        [
            'id_kelas.unique' => 'Id kelas sudah terdaftar.',
        
        ])->validate();
     
        $id_kelas = $request->input('id_kelas');
        $nama_kelas = $request->input('nama_kelas');
    

        DB::update("UPDATE kelas SET nama_kelas='$nama_kelas'  WHERE id_kelas='$id_kelas'");

        // $database = DB::select('select * from mahasiswa');
        // return view('mahasiswa.index', ['database' => $database])->with('succes','Data mahasiswa berhasil di update');
        return redirect()->route('kelas');
    }


    
}
