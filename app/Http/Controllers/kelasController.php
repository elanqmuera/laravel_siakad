<?php

namespace App\Http\Controllers;

use App\Models\ModelKelas;
use Illuminate\Http\Request;
use App\Models\ModelMahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ModelTahunajaran;
use Illuminate\Support\Facades\Validator;

class kelasController extends Controller
{
    private $tahunajaran;
    private $kelas;

    public function __construct()
    {
        $this->tahunajaran = new ModelTahunajaran();
        $this->kelas = new ModelKelas();
    }



    public function index(Request $request)
    {

        $data = [
            'kelas' => $this->kelas->dataKelas(),
        ];

        return view('kelas.index', $data);
    }

    // public function lihat($id_kelas)
    // {
    //     $modelKelas = new ModelKelas();
    //     $datakelas = DB::table('kelas')->first();
    //     $ModelMahasiswa = new ModelMahasiswa();

    //     // $result = $modelKelas->kelas();


    //     $mahasiswa = DB::table('mahasiswa')
    //         ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id_kelas')
    //         ->select('mahasiswa.*')
    //         ->where('kelas.id_kelas', $id_kelas)
    //         ->get();

    //     return view('kelas.lihat', ['dataMahasiswa' => $mahasiswa, 'dataKelas' => $datakelas]);
    // }

    public function tambah()
    {
        $data = [
            'tahunajaran' => $this->tahunajaran->allData(),
        ];
        return view('kelas.tambah', $data);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'id_kelas' => 'required|unique:kelas,id_kelas',
                'nama_kelas' => 'required|',
            ],

            [
                'id_kelas.required' => 'Kolom kode kelas harus diisi.',
                'id_kelas.unique' => 'kode kelas sudah terdaftar.',
                'nama_kelas.required' => 'Kolom nama harus diisi.'
            ]
        )->validate();


        $datakelas = [
            'id_kelas' => $request->input('id_kelas'),
            'id_tahunajaran' => $request->input('id_tahunajaran'),
            'nama_kelas' => $request->input('nama_kelas'),
        ];

        $this->kelas->tambah($datakelas);

        return redirect()->route('kelas')->with('success', 'Berhasil menambah data');
    }
    public function edit($id)
    {
        $data = [
            'tahunajaran' => $this->tahunajaran->allData(),
            'kelas' => $this->kelas->detail($id),
        ];

        return view('kelas.edit', $data);
    }

    public function update(Request $request, $id)
    {

        // validasi 
        Validator::make(
            $request->all(),
            [
                'id_kelas' => 'required|',
                'nama_kelas' => 'required|',
            ],

            [
                'id_kelas.required' => 'Kolom nama harus diisi.',
                'nama_kelas.required' => 'Kolom deskripsi harus diisi.'
            ]
        )->validate();

        $datakelas = [
            'id'  => $id,
            'id_kelas' => $request->input('id_kelas'),
            'nama_kelas' => $request->input('nama_kelas'),
            'id_tahunajaran' => $request->input('id_tahunajaran'),
        ];

        $this->kelas->edit($datakelas);

        return redirect()->route('kelas')->with('successUpdate', 'Data berhasil diubah');
    }


    public function hapus($id)
    {
        DB::delete('delete from kelas where id =' . $id);
        return redirect()->route('kelas')->with('success', 'Data Kelas berhasil dihapus');
    }

    public function detail($id_kelas)
    {
        $data = [
            'kelasmahasiswa' => $this->kelas->detailMahasiswa($id_kelas),
            'namakelas' => $this->kelas->detailKelas($id_kelas)
        ];
        return view('kelas.detail', $data);
    }
}
