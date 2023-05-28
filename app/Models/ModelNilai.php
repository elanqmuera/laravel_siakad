<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelNilai extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('nilai')
            ->leftJoin('tugas', 'tugas.id_tugas', '=', 'nilai.id_tugas')
            ->leftJoin('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'nilai.id_mahasiswa')
            ->get();
    }

    public function tambah($dataNilai)
    {
        DB::table('nilai')->insert($dataNilai);
    }

    public function detail($id_nilai)
    {
        return DB::table('nilai')
            ->leftJoin('tugas', 'tugas.id_tugas', '=', 'nilai.id_tugas')
            ->leftJoin('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'nilai.id_mahasiswa')
            ->where('id_nilai', $id_nilai)
            ->first();
    }


    public function edit($dataNilai)
    {
        DB::table('nilai')->where('id_nilai', $dataNilai['id_nilai'])->update($dataNilai);
    }

    public function hapus($id_nilai)
    {
        DB::table('nilai')->where('id_nilai', $id_nilai)->delete();
    }
}
