<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTahunajaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class tahunajaranController extends Controller
{
    private $tahunajaran;
    private $matkul;


    public function __construct()
    {
        $this->tahunajaran = new ModelTahunajaran();
    }

    public function index()
    {


        $data = [
            'tahunajaran' => $this->tahunajaran->allData(),
        ];

        return view('tahunajaran.index', $data);
    }

    public function tambah()
    {

        return view('tahunajaran.tambah');
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nama_tahunajaran' => 'required|',
            ],

            [
                'nama_tahunajaran.required' => 'Kolom tahun ajaran harus diisi.',
            ]
        )->validate();


        $datatahunajaran = [
            'nama_tahunajaran' => $request->input('nama_tahunajaran'),
        ];

        $this->tahunajaran->tambah($datatahunajaran);

        return redirect()->route('tahunajaran')->with('success', 'Berhasil menambah data');
    }

    public function edit($id_tahunajaran)
    {
        $data = [
            'tahunajaran' => $this->tahunajaran->detail($id_tahunajaran),
        ];

        return view('tahunajaran.edit', $data);
    }

    public function update(Request $request, $id_tahunajaran)
    {

        // validasi 
        Validator::make(
            $request->all(),
            [
                'nama_tahunajaran' => 'required|',
            ],
            [
                'nama_tahunajaran.required' => 'Kolom nama tahun harus diisi.',
            ]
        )->validate();

        $datatahun = [
            'id_tahunajaran'  => $id_tahunajaran,
            'nama_tahunajaran' => $request->input('nama_tahunajaran'),
        ];

        $this
            ->tahunajaran->edit($datatahun);

        return redirect()->route('tahunajaran')->with('successUpdate', 'Data berhasil diubah');
    }

    public function hapus($id_tahunajaran)
    {
        $this->tahunajaran->hapus($id_tahunajaran);

        return redirect()->route('tahunajaran')->with('successHapus', 'Data berhasil dihapus');
    }
}
