<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTahunajaran extends Model
{
    use HasFactory;
    public function allData()
    {
        return DB::table('tahun_ajaran')->get();
    }

    public function tambah($datatahunajaran)
    {
        DB::table('tahun_ajaran')->insert($datatahunajaran);
    }

    public function detail($id_tahunajaran)
    {
        return DB::table('tahun_ajaran')
            ->where('id_tahunajaran', $id_tahunajaran)
            ->first();
    }

    public function edit($datatahun)
    {
        DB::table('tahun_ajaran')->where('id_tahunajaran', $datatahun['id_tahunajaran'])->update($datatahun);
    }

    public function hapus($id_tahunajaran)
    {
        DB::table('tahun_ajaran')->where('id_tahunajaran', $id_tahunajaran)->delete();
    }
}
