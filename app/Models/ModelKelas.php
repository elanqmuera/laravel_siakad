<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKelas extends Model
{
    use HasFactory;

    public function dataKelas()
    {
        return DB::table('kelas')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id_tahunajaran', '=', 'kelas.id_tahunajaran')
            ->get();
    }

    public function dataMahasiswa($kelasId)
    {
        //       return DB::select('select * from mahasiswa JOIN kelas
        //  ON mahasiswa.id_kelas WHERE kelas.id_kelas ');

        return DB::table('mahasiswa')
            ->join('kelas', 'mahasiswa.id_kelas', '=', 'kelas.id_kelas')
            ->select('mahasiswa.*')
            ->where('kelas.id_kelas', $kelasId)
            ->get();
    }

    public function kelas($kelasId)
    {

        return DB::select('select * from mahasiswa LEFT JOIN kelas
 ON kelas.id_kelas = mahasiswa.id_kelas WHERE id_kelas', $kelasId);
    }

    public function tambah($datakelas)
    {
        DB::table('kelas')->insert($datakelas);
    }

    public function detail($id)
    {
        return DB::table('kelas')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id_tahunajaran', '=', 'kelas.id_tahunajaran')
            ->where('id', $id)
            ->first();
    }


    public function edit($datakelas)
    {
        DB::table('kelas')->where('id', $datakelas['id'])->update($datakelas);
    }

    public function detailMahasiswa($id_kelas)
    {
        return DB::table('kelas')
            ->join('mahasiswa', 'mahasiswa.id_kelas', '=', 'kelas.id_kelas')
            ->select('mahasiswa.*')
            ->where('mahasiswa.id_kelas', $id_kelas)
            ->get();
    }

    public function detailKelas($id_kelas)
    {
        return DB::table('kelas')
            ->join('mahasiswa', 'mahasiswa.id_kelas', '=', 'kelas.id_kelas')
            ->where('mahasiswa.id_kelas', $id_kelas)
            ->first();
    }
}
