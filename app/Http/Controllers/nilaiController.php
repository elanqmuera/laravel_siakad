<?php

namespace App\Http\Controllers;

use App\Models\ModelNilai;
use App\Models\ModelTugas;
use Illuminate\Http\Request;
use App\Models\ModelMahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class nilaiController extends Controller
{
    private $tugas;
    private $nilai;
    private $mahasiswa;

    public function __construct()
    {
        $this->tugas = new ModelTugas();
        $this->nilai = new ModelNilai();
        $this->mahasiswa = new ModelMahasiswa();
    }

    public function index()
    {
        $data = [
            'nilai' => $this->nilai->allData(),
        ];

        return view('nilai.index', $data);
    }

    public function tambah()
    {
        $data = [
            'tugas' => $this->tugas->allData(),
            'mahasiswa' => $this->mahasiswa->allData(),
        ];

        return view('nilai.tambah', $data);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nilai' => 'required|',
            ],

            [
                'nilai.required' => 'Kolom nilai harus diisi.',
            ]
        )->validate();


        $dataNilai = [
            'id_tugas' => $request->input('id_tugas'),
            'id_mahasiswa' => $request->input('id_mahasiswa'),
            'nilai' => $request->input('nilai'),
        ];

        $this->nilai->tambah($dataNilai);

        return redirect()->route('nilai')->with('success', 'Berhasil menambah data');
    }

    public function edit($id_nilai)
    {
        $data = [
            'tugas' => $this->tugas->allData(),
            'mahasiswa' => $this->mahasiswa->allData(),
            'nilai' => $this->nilai->detail($id_nilai),
        ];

        return view('nilai.edit', $data);
    }


    public function update(Request $request, $id_nilai)
    {
        // validasi 
        Validator::make(
            $request->all(),
            [
                'nilai' => 'required|',
            ],

            [
                'nilai.required' => 'Kolom nilai harus diisi.',
            ]
        )->validate();


        $dataNilai = [
            'id_nilai'  => $id_nilai,
            'id_tugas' => $request->input('id_tugas'),
            'id_mahasiswa' => $request->input('id_mahasiswa'),
            'nilai' => $request->input('nilai'),
        ];

        $this->nilai->edit($dataNilai);

        return redirect()->route('nilai')->with('successUpdate', 'Data berhasil diubah');
    }

    public function hapus($id_nilai)
    {
        $this->nilai->hapus($id_nilai);
        return redirect()->route('nilai')->with('successHapus', 'Data berhasil dihapus');
    }
}
