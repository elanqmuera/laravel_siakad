<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTugas extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('tugas')
            ->leftJoin('pertemuan', 'pertemuan.id_pertemuan', '=', 'tugas.id_pertemuan')
            ->leftJoin('dosen', 'dosen.id_dosen', '=', 'tugas.id_dosen')
            ->get();
    }

    public function tugasDosen()
    {
        return DB::table('tugas')
            ->leftJoin('pertemuan', 'pertemuan.id_pertemuan', '=', 'tugas.id_pertemuan')
            ->leftJoin('dosen', 'dosen.id_dosen', '=', 'tugas.id_dosen')
            ->where('dosen.id_dosen', Session()->get('id_dosen'));
    }

    public function tambah($dataTugas)
    {
        DB::table('tugas')->insert($dataTugas);
    }


    public function detail($id_tugas)
    {
        return DB::table('tugas')
            ->leftJoin('pertemuan', 'pertemuan.id_pertemuan', '=', 'tugas.id_pertemuan')
            ->leftJoin('dosen', 'dosen.id_dosen', '=', 'tugas.id_dosen')
            ->where('id_tugas', $id_tugas)
            ->first();
    }
    public function hapus($id_tugas)
    {
        DB::table('tugas')->where('id_tugas', $id_tugas)->delete();
    }

    public function edit($dataTugas)
    {
        DB::table('tugas')->where('id_tugas', $dataTugas['id_tugas'])->update($dataTugas);
    }
}
