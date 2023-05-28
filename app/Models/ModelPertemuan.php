<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPertemuan extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('pertemuan')
            ->leftJoin('matkul', 'matkul.id_matkul', '=', 'pertemuan.id_matkul')
            ->get();
    }

    public function detail($id_pertemuan)
    {
        return DB::table('pertemuan')
            ->leftJoin('matkul', 'matkul.id_matkul', '=', 'pertemuan.id_matkul')
            ->leftJoin('kelas', 'kelas.id_kelas', '=', 'matkul.id_kelas')
            ->where('id_pertemuan', $id_pertemuan)
            ->first();
    }

    public function tambah($dataPertemuan)
    {
        DB::table('pertemuan')->insert($dataPertemuan);
    }

    public function edit($dataPertemuan)
    {
        DB::table('pertemuan')->where('id_pertemuan', $dataPertemuan['id_pertemuan'])->update($dataPertemuan);
    }

    public function hapus($id_pertemuan)
    {
        DB::table('pertemuan')->where('id_pertemuan', $id_pertemuan)->delete();
    }
}
