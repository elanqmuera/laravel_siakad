<?php

namespace App\Http\Controllers;

use App\Models\ModelKelas;
use Illuminate\Http\Request;
use App\Models\ModelMahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class mahasiswaController extends Controller
{
    // public function __construct()
    // {
      
    // }

    public function index() {
        // $database = DB::select('select * from mahasiswa LEFT JOIN kelas
        //  ON kelas.id_kelas = mahasiswa.id_kelas LEFT JOIN matkul ON matkul.id_matkul = mahasiswa.id_matkul');
        $ModelMahasiswa = new ModelMahasiswa();
        $result = $ModelMahasiswa->allData();
        $modelKelas = new ModelKelas();
        $dataKelas = $modelKelas->dataKelas();
       
        // $result = ModelMahasiswa::allData();
        // $database = [
        //     'database' => $this->$result->allData(),
        // ];
        return view('mahasiswa.index',['database' => $result, 'dataKelas' => $dataKelas]);
    }


    public function tambah(){
        $modelKelas = new ModelKelas();
        $dataKelas = $modelKelas->dataKelas();

        return view('mahasiswa.tambah',['dataKelas' => $dataKelas]);
    }
     
    public function simpan(Request $request){
        Validator::make($request->all(), [
            'nim'=> 'required|numeric|unique:mahasiswa,nim',
            'nama_mahasiswa'=>'required|',
            'email'=>'required|email|unique:mahasiswa,email',
            'password'=>'required|min:8',
        ],
        [
            'nim.required' => 'Kolom nim harus diisi.',
            'nim.unique' => 'Nim sudah terdaftar.',
            'nim.numeric'  => 'NIM harus angka!',
            'nama_mahasiswa.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Kolom email harus berupa alamat email yang valid.',
            'email.unique' => 'Alamat email sudah terdaftar.',
            'email.max' => 'Kolom email tidak boleh lebih dari :max karakter.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Kolom password harus terdiri dari minimal :min karakter.',
            ])->validate();

        $nim = $request->input('nim');
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $foto = $request->input('foto');
        $password = $request->input('password');
        $nama_kelas = $request->input('id_kelas');

        // DB::insert("INSERT INTO mahasiswa (nim, nama_mahasiswa, email, gender, foto, password, id_kelas) VALUES('$nim','$nama_mahasiswa','$email','$gender','$foto','$password','$id_kelas')");
        $database = DB::select('select * from mahasiswa');
        
        DB::table('mahasiswa')->insert([
            'nim' => $nim,
            'nama_mahasiswa' => $nama_mahasiswa,
            'email' =>  $email,
            'gender' => $gender,
            'foto' => $foto,
            'password' => $password,
            'id_kelas' => $nama_kelas,
        ]);

        return view('mahasiswa.index', ['database' => $database]);
    }  
    public function edit($id_mahasiswa){
        $database = DB::select('select * from mahasiswa where id_mahasiswa ='.$id_mahasiswa);
        return view('mahasiswa.edit',['database' => $database]);
    }
    public function update(Request $request, $id_mahasiswa){
     
        $nim = $request->input('nim');
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $password = $request->input('password');
        $foto = $request->input('foto');
  

        DB::update("UPDATE mahasiswa SET nim ='$nim',nama_mahasiswa='$nama_mahasiswa',email='$email',gender='$gender',password='$password',foto='$foto' WHERE id_mahasiswa='$id_mahasiswa'");

        // $database = DB::select('select * from mahasiswa');
        // return view('mahasiswa.index', ['database' => $database])->with('succes','Data mahasiswa berhasil di update');
        return redirect()->route('mahasiswa');
    }

    public function hapus($id){
        DB::delete('delete from mahasiswa where id_mahasiswa ='.$id);
        return redirect()->route('mahasiswa')->with('succes','Data mahasiswa berhasil dihapus');
       
        
    }
}