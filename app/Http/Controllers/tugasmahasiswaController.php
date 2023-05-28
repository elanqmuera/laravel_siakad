<?php

namespace App\Http\Controllers;

use App\Models\ModelTugas;
use Illuminate\Http\Request;
use App\Models\ModelMahasiswa;
use App\Models\ModelTugasmahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class tugasmahasiswaController extends Controller
{
    private $tugas;
    private $mahasiswa;
    private $tugasmahasiswa;

    public function __construct()
    {
        $this->tugas = new ModelTugas();
        $this->mahasiswa = new ModelMahasiswa();
        $this->tugasmahasiswa = new ModelTugasmahasiswa();
    }

    public function index()
    {
        $data = [
            'tugasMahasiswa' => $this->tugasmahasiswa->allData(),
        ];

        return view('tugasMahasiswa.index', $data);
    }

    public function tambah()
    {
        $data = [
            'tugas' => $this->tugas->allData(),
            'mahasiswa' => $this->mahasiswa->allData(),
        ];

        return view('tugasMahasiswa.tambah', $data);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'id_tugas' => 'required|',
                'id_mahasiswa' => 'required|',
            ],

            [
                'id_tugas.required' => 'Kolom nama tugas harus diisi.',
                'id_mahasiswa.required' => 'Kolom mahasiswa harus diisi.'
            ]
        )->validate();


        $tugasMahasiswa = [
            'id_tugas' => $request->input('id_tugas'),
            'id_mahasiswa' => $request->input('id_mahasiswa'),
        ];

        $this->tugasmahasiswa->tambah($tugasMahasiswa);

        return redirect()->route('tugasMahasiswa')->with('success', 'Berhasil menambah data');
    }

    public function edit($id_tugasmahasiswa)
    {
        $data = [
            'tugasMahasiswa' => $this->tugasmahasiswa->detail($id_tugasmahasiswa),
            'mahasiswa' => $this->mahasiswa->allData(),
            'tugas' => $this->tugas->allData(),
        ];

        return view('tugasMahasiswa.edit', $data);
    }

    public function update(Request $request, $id_tugasmahasiswa)
    {
        $datatugasmahasiswa = [
            'id_tugasmahasiswa' => $id_tugasmahasiswa,
            'id_tugas' => $request->input('id_tugas'),
            'id_mahasiswa' => $request->input('id_mahasiswa'),
        ];

        $this->tugasmahasiswa->ubah($datatugasmahasiswa);

        return redirect()->route('tugasMahasiswa')->with('successUpdate', 'Data berhasil diubah');
    }
}
