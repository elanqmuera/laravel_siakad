<?php

namespace App\Http\Controllers;

use App\Models\ModelDosen;
use App\Models\ModelTugas;
use Illuminate\Http\Request;
use App\Models\ModelPertemuan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class tugasController extends Controller
{
    private $tugas;
    private $pertemuan;
    private $dosen;

    public function __construct()
    {
        $this->tugas = new ModelTugas();
        $this->pertemuan = new ModelPertemuan();
        $this->dosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'tugas' => $this->tugas->allData(),
        ];

        return view('tugas.index', $data);
    }

    public function tambah()
    {
        $data = [
            'pertemuan' => $this->pertemuan->allData(),
            'dosen' => $this->dosen->allData(),
        ];

        return view('tugas.tambah', $data);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nama_tugas' => 'required|',
                'deskripsi' => 'required|',
            ],

            [
                'nama_tugas.required' => 'Kolom nama tugas harus diisi.',
                'deskripsi.required' => 'Kolom deskripsi harus diisi.'
            ]
        )->validate();


        $dataTugas = [
            'nama_tugas' => $request->input('nama_tugas'),
            'deskripsi' => $request->input('deskripsi'),
            'id_pertemuan' => $request->input('id_pertemuan'),
            'id_dosen' => $request->input('id_dosen'),
        ];

        $this->tugas->tambah($dataTugas);

        return redirect()->route('tugas')->with('success', 'Berhasil menambah data');
    }

    public function edit($id_tugas)
    {
        $data = [
            'tugas' => $this->tugas->detail($id_tugas),
            'pertemuan' => $this->pertemuan->allData(),
            'dosen' => $this->dosen->allData(),
        ];

        return view('tugas.edit', $data);
    }


    public function update(Request $request, $id_tugas)
    {
        // validasi 
        Validator::make(
            $request->all(),
            [
                'nama_tugas' => 'required|',
                'deskripsi' => 'required|',
            ],

            [
                'nama_tugas.required' => 'Kolom nama tugas harus diisi.',
                'deskripsi.required' => 'Kolom deskripsi harus diisi.'
            ]
        )->validate();


        $dataTugas = [
            'id_tugas'  => $id_tugas,
            'nama_tugas' => $request->input('nama_tugas'),
            'deskripsi' => $request->input('deskripsi'),
            'id_pertemuan' => $request->input('id_pertemuan'),
            'id_dosen' => $request->input('id_dosen'),
        ];

        $this->tugas->edit($dataTugas);

        return redirect()->route('tugas')->with('successUpdate', 'Data berhasil diubah');
    }

    public function hapus($id_tugas)
    {
        $this->tugas->hapus($id_tugas);
        return redirect()->route('tugas')->with('successHapus', 'Data berhasil dihapus');
    }
}
