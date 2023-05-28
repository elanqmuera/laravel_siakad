<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTugasmahasiswa extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('tugas_mahasiswa')
            ->leftJoin('tugas', 'tugas.id_tugas', '=', 'tugas_mahasiswa.id_tugas')
            ->leftJoin('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'tugas_mahasiswa.id_mahasiswa')
            ->get();
    }

    public function tambah($tugasMahasiswa)
    {
        DB::table('tugas_mahasiswa')->insert($tugasMahasiswa);
    }

    public function detail($id_tugasmahasiswa)
    {
        return DB::table('tugas_mahasiswa')
            ->leftJoin('tugas', 'tugas.id_tugas', '=', 'tugas_mahasiswa.id_tugas')
            ->leftJoin('mahasiswa', 'mahasiswa.id_mahasiswa', '=', 'tugas_mahasiswa.id_mahasiswa')
            ->where('id_tugasmahasiswa', $id_tugasmahasiswa)
            ->first();
    }

    public function ubah($datatugasmahasiswa)
    {
        DB::table('tugas_mahasiswa')->where('id_tugasmahasiswa', $datatugasmahasiswa['id_tugasmahasiswa'])->update($datatugasmahasiswa);
    }
}
