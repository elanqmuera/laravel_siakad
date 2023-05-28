<?php

namespace App\Http\Controllers;

use App\Models\ModelDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelKelas;
use App\Models\ModelMatkul;
use App\Models\ModelTugas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class dosenController extends Controller
{
    private $dosen;
    private $kelas;
    private $tugas;
    private $matkul;

    public function __construct()
    {
        $this->dosen = new ModelDosen();
        $this->kelas = new ModelKelas();
        $this->tugas = new ModelTugas();
        $this->matkul = new ModelMatkul();
    }



    public function index(Request $request)
    {

        $data = [
            'dosen' => $this->dosen->allData(),
        ];

        return view('dosen.index', $data);
    }

    public function tambah()
    {
        return view('dosen.tambah');
    }


    public function dosenSimpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nip' => 'required|numeric|unique:dosen,nip',
                'nama_dosen' => 'required|',
                'email' => 'required|email|unique:dosen,email',
                'password' => 'required|min:8',
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
            ]
        )->validate();

        $nip = $request->input('nip');
        $nama_dosen = $request->input('nama_dosen');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $foto = $request->input('foto');
        $password = Hash::make($request->input('password'));
        $image = $request->input('foto');

        // DB::insert("INSERT INTO mahasiswa (nim, nama_mahasiswa, email, gender, foto, password, id_kelas) VALUES('$nim','$nama_mahasiswa','$email','$gender','$foto','$password','$id_kelas')");
        $dataDosen = DB::select('select * from dosen');

        DB::table('dosen')->insert([
            'nip' => $nip,
            'nama_dosen' => $nama_dosen,
            'email' =>  $email,
            'gender' => $gender,
            'foto' => $foto,
            'password' => $password,
            'foto' => $foto,
        ]);

        return view('dosen.index', ['dataDosen' => $dataDosen]);
    }

    public function edit($id_dosen)
    {
        $database = DB::select('select * from dosen where id_dosen =' . $id_dosen);
        return view('dosen.edit', ['database' => $database]);
    }

    public function update(Request $request, $id_dosen)
    {

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

    public function hapus($id_dosen)
    {
        DB::delete('delete from dosen where id_dosen =' . $id_dosen);
        return redirect()->route('dosen')->with('succes', 'Data mahasiswa berhasil dihapus');
    }


    public function buatTugas()
    {
        // $data = [
        //     'tugas' => $this->tugas->tugasDosen()
        // ];

        return view('dosen.buat_tugas',);
    }
}
