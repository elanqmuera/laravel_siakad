<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelMatkul;
use App\Models\ModelPertemuan;
use Illuminate\Support\Facades\Validator;

class pertemuanController extends Controller
{
    private $pertemuan;
    private $matkul;


    public function __construct()
    {
        $this->pertemuan = new ModelPertemuan();
        $this->matkul = new ModelMatkul();
    }

    public function index()
    {


        $data = [
            'pertemuan' => $this->pertemuan->allData(),
        ];

        return view('pertemuan.index', $data);
    }

    public function tambah()
    {
        $data = [
            'matkul' => $this->matkul->dataMatkul(),
        ];

        return view('pertemuan.tambah', $data);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'pertemuan' => 'required|',
                'deskripsi' => 'required|',
            ],

            [
                'pertemuan.required' => 'Kolom nama harus diisi.',
                'deskripsi.required' => 'Kolom deskripsi harus diisi.'
            ]
        )->validate();


        $dataPertemuan = [
            'pertemuan' => $request->input('pertemuan'),
            'deskripsi' => $request->input('deskripsi'),
            'id_matkul' => $request->input('id_matkul'),
        ];

        $this->pertemuan->tambah($dataPertemuan);

        return redirect()->route('pertemuan')->with('success', 'Berhasil menambah data');
    }

    public function edit($id_pertemuan)
    {
        $data = [
            'pertemuan' => $this->pertemuan->detail($id_pertemuan),
            'matkul' => $this->matkul->dataMatkul(),
        ];

        return view('pertemuan.edit', $data);
    }

    public function update(Request $request, $id_pertemuan)
    {

        // validasi 
        Validator::make(
            $request->all(),
            [
                'pertemuan' => 'required|',
                'deskripsi' => 'required|',
            ],

            [
                'pertemuan.required' => 'Kolom nama harus diisi.',
                'deskripsi.required' => 'Kolom deskripsi harus diisi.'
            ]
        )->validate();

        $dataPertemuan = [
            'id_pertemuan'  => $id_pertemuan,
            'pertemuan' => $request->input('pertemuan'),
            'deskripsi' => $request->input('deskripsi'),
            'id_matkul' => $request->input('id_matkul'),
        ];

        $this->pertemuan->edit($dataPertemuan);

        return redirect()->route('pertemuan')->with('successUpdate', 'Data berhasil diubah');
    }

    public function hapus($id_pertemuan)
    {
        $this->pertemuan->hapus($id_pertemuan);
        return redirect()->route('pertemuan')->with('successHapus', 'Data berhasil dihapus');
    }
}
