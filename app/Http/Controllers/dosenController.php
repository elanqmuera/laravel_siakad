<?php

namespace App\Http\Controllers;

use App\Models\ModelDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class dosenController extends Controller
{
    public function index() {
        $modelDosen = new ModelDosen();
        $dataDosen = $modelDosen->dataDosen();

        return view('dosen.index',['dataDosen' => $dataDosen]);
    }

    public function tambah() {
        return view('dosen.tambah');
    }

     
    public function dosenSimpan(Request $request){
        Validator::make($request->all(), [
            'nip'=> 'required|numeric|unique:mahasiswa,nim',
            'nama_dosen'=>'required|',
            'email'=>'required|email|unique:mahasiswa,email',
            'password'=>'required|min:8',
        ],
        [
            'nip.required' => 'Kolom NIP harus diisi.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'nip.numeric'  => 'NIP harus angka!',
            'nama_dosen.required' => 'Kolom nama harus diisi.',
            'email.required' => 'Kolom email harus diisi.',
            'email.email' => 'Kolom email harus berupa alamat email yang valid.',
            'email.unique' => 'Alamat email sudah terdaftar.',
            'email.max' => 'Kolom email tidak boleh lebih dari :max karakter.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Kolom password harus terdiri dari minimal :min karakter.',
            ])->validate();

        $nip = $request->input('nip');
        $nama_dosen = $request->input('nama_dosen');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $foto = $request->input('foto');
        $password = $request->input('password');
      

        // DB::insert("INSERT INTO mahasiswa (nim, nama_mahasiswa, email, gender, foto, password, id_kelas) VALUES('$nim','$nama_mahasiswa','$email','$gender','$foto','$password','$id_kelas')");
        $dataDosen = DB::select('select * from dosen');
        
        DB::table('dosen')->insert([
            'nip' => $nip,
            'nama_dosen' => $nama_dosen,
            'email' =>  $email,
            'gender' => $gender,
            'foto' => $foto,
            'password' => $password,
        ]);

        return view('dosen.index', ['dataDosen' => $dataDosen]);
    } 

    public function edit($id_dosen){
        $database = DB::select('select * from dosen where id_dosen ='.$id_dosen);
        return view('dosen.edit',['database' => $database]);
    }

    public function update(Request $request, $id_dosen){
     
        $nip = $request->input('nip');
        $nama_dosen = $request->input('nama_dosen');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $password = $request->input('password');
        $foto = $request->input('foto');
  

        DB::update("UPDATE dosen SET nip ='$nip',nama_dosen='$nama_dosen',email='$email',gender='$gender',password='$password',foto='$foto' WHERE id_dosen='$id_dosen'");

        // $database = DB::select('select * from mahasiswa');
        // return view('mahasiswa.index', ['database' => $database])->with('succes','Data mahasiswa berhasil di update');
        return redirect()->route('dosen');
    }

    public function hapus($id_dosen){
        DB::delete('delete from dosen where id_dosen ='.$id_dosen);
        return redirect()->route('dosen')->with('succes','Data mahasiswa berhasil dihapus');
       
        
    }

}
