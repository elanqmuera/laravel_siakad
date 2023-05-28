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
    private $mahasiswa;
    private $kelas;

    public function __construct()
    {
        $this->mahasiswa = new ModelMahasiswa();
        $this->kelas = new ModelKelas();
    }

    public function index()
    {

        $ModelMahasiswa = new ModelMahasiswa();

        $modelKelas = new ModelKelas();
        $dataKelas = $modelKelas->dataKelas();

        $result = $ModelMahasiswa->allData();
        // $database = [
        //     'database' => $this->$result->allData(),
        // ];
        $data = [
            'mahasiswa' => $this->mahasiswa->allData(),
        ];


        return view('mahasiswa.index', $data);
    }


    public function tambah()
    {

        $data = [
            'kelas' => $this->kelas->dataKelas(),
        ];

        return view('mahasiswa.tambah', $data);
    }

    public function simpan(Request $request,)
    {
        Request()->validate(
            [
                'nim' => 'required|numeric|unique:mahasiswa,nim',
                'nama_mahasiswa' => 'required|',
                'email' => 'required|email|unique:mahasiswa,email',
                'password' => 'required|min:8',
                // 'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            ]
        );

        // if ($request->hasFile('foto')) {
        //     $this->mahasiswa->uploadFoto($request->file('foto'));
        // }
        // $image = request()->foto;
        // $imagefile = date('mdyHis') . request()->id_mahasiswa . '.' . $image->extension();
        // $image->move(public_path('foto_mahasiswa'));

        $dataMahasiswa = [
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'gender' => $request->gender,
            'foto' => $request->foto,
            'password' => $request->password,
            'id_kelas' => $request->id_kelas,
        ];

        $this->mahasiswa->tambah($dataMahasiswa);

        return redirect()->route('mahasiswa')->with('success', 'Berhasil menambah data');
    }

    // public function edit($id_mahasiswa)
    // {

    //     $modelKelas = new ModelKelas();
    //     $dataKelas = $modelKelas->dataKelas();
    //     $database = DB::select('select * from mahasiswa where id_mahasiswa =' . $id_mahasiswa);
    //     return view('mahasiswa.edit', ['database' => $database, 'dataKelas' => $dataKelas]);
    // }

    public function edit($id_mahasiswa)
    {
        $data = [
            'mahasiswa' => $this->mahasiswa->detail($id_mahasiswa),
            'kelas' => $this->kelas->dataKelas(),
        ];

        return view('mahasiswa.edit', $data);
    }

    public function update(Request $request, $id_mahasiswa)
    {

        $validate = $this->mahasiswa->detail($id_mahasiswa);
        if ($validate->nim == $request->nim) {
            $request->validate(
                [
                    'nim' => 'required',
                    'nama_mahasiswa' => 'required|',
                    'email' => 'required|',
                    'password' => 'required|min:8',
                ],
                [
                    'nim.required' => 'Nim harus diisi.',
                    'nama_mahasiswa.required' => 'nama mahasiswa harus diisi.',
                    'email.required' => 'nama mahasiswa harus diisi.',
                ]
            );
        } else {
            $request->validate(
                [
                    'nim' => 'required|numeric|unique:mahasiswa,nim',
                    'nama_mahasiswa' => 'required|',
                    'email' => 'required|email|unique:mahasiswa,email',
                    'password' => 'required|min:8',
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
                ]
            );
        }

        $nim = $request->input('nim');
        $nama_mahasiswa = $request->input('nama_mahasiswa');
        $email = $request->input('email');
        $gender = $request->input('gender');
        $password = $request->input('password');
        $foto = $request->input('foto');
        $id_kelas = $request->input('id_kelas');


        DB::update("UPDATE mahasiswa SET nim ='$nim',nama_mahasiswa='$nama_mahasiswa',email='$email',gender='$gender',password='$password',foto='$foto',id_kelas='$id_kelas' WHERE id_mahasiswa='$id_mahasiswa'");

        // $database = DB::select('select * from mahasiswa');
        // return view('mahasiswa.index', ['database' => $database])->with('succes','Data mahasiswa berhasil di update');
        return redirect()->route('mahasiswa');
    }

    public function hapus($id)
    {
        DB::delete('delete from mahasiswa where id_mahasiswa =' . $id);
        return redirect()->route('mahasiswa')->with('succes', 'Data mahasiswa berhasil dihapus');
    }
}
