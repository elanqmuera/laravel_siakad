<?php

namespace App\Http\Controllers;

use App\Models\ModelMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class matkulController extends Controller
{
    private $matkul;

    public function __construct()
    {
        $this->matkul = new ModelMatkul();
    }

    public function index()
    {
        // $ModelMatkul = new ModelMatkul();
        // $dosenMatkul = $ModelMatkul->dosenMatkul();
        // $dataMatkul = $ModelMatkul->dataMatkul();
        $data = [
            'matkuldosen' => $this->matkul->dataMatkul()
        ];

        return view('matkul.index', $data);
    }

    public function tambah()
    {
        $ModelMatkul = new ModelMatkul();
        $dosenMatkul = $ModelMatkul->dosenMatkul();
        return view('matkul.tambah', ['dosenMatkul' => $dosenMatkul]);
    }

    public function simpan(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'id_matkul' => 'required|unique:matkul,id_matkul',
                'nama_matkul' => 'required|',
            ],

            [
                'id_matkul.required' => 'Kolom kode matkul harus diisi.',
                'id_matkul.unique' => 'kode matkul sudah terdaftar.',
                'nama_matkul.required' => 'Kolom nama harus diisi.'
            ]
        )->validate();

        $id_matkul = $request->input('id_matkul');
        $nama_matkul = $request->input('nama_matkul');

        DB::table('matkul')->insert([
            'id_matkul' => $id_matkul,
            'nama_matkul' => $nama_matkul,
        ]);

        $ModelMatkul = new ModelMatkul();
        $dataMatkul = $ModelMatkul->dataMatkul();
        return view('matkul.index', ['dataMatkul' => $dataMatkul]);
    }

    public function edit($id)
    {
        // $ModelMatkul = new ModelMatkul();
        // $editMatkul = $ModelMatkul->editMatkul($id);
        $editMatkul = DB::select('select * from matkul where id =' . $id);
        return view('matkul.edit', ['editMatkul' => $editMatkul]);
    }

    public function update(Request $request, $id)
    {

        $id_matkul = $request->input('id_matkul');
        $nama_matkul = $request->input('nama_matkul');

        DB::update("UPDATE matkul SET id_matkul='$id_matkul',nama_matkul='$nama_matkul'  WHERE id='$id'");
        return redirect()->route('matkul');
    }

    public function hapus($id)
    {
        DB::delete('delete from matkul where id =' . $id);
        return redirect()->route('matkul')->with('successhapus', 'Data matkul berhasil dihapus');
    }

    public function detail($id_matkul)
    {
        $data = [
            'matkuldosen' => $this->matkul->detailData($id_matkul),
            'matkul' => $this->matkul->detailMatkul($id_matkul)
        ];
        return view('matkul.detail', $data);
    }
}
