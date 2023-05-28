<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class ModelMahasiswa extends Model
{
    protected $table = 'mahasiswa';
    use HasFactory;

    public function allData()
    {

        return DB::table('mahasiswa')
            ->leftJoin('kelas', 'kelas.id_kelas', '=', 'mahasiswa.id_kelas')
            ->get();
    }

    public function detail($id_mahasiswa)
    {
        return DB::table('mahasiswa')
            ->leftJoin('matkul', 'matkul.id_matkul', '=', 'mahasiswa.id_matkul')
            ->leftJoin('kelas', 'kelas.id_kelas', '=', 'mahasiswa.id_kelas')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->first();
    }

    public function tambah($dataMahasiswa)
    {
        DB::table('mahasiswa')->insert($dataMahasiswa);
    }

    public function uploadFoto($file)
    {
        //menghapus foto sebelumnya
        if ($this->foto) {
            Storage::delete($this->foto);
        }
        //mengupload foto baru
        $path = $file->store('public/foto_mahasiswa');
        $this->foto = $path;
        $this->save();
    }

    public function getFoto()
    {
        if ($this->foto) {
            return Storage::url($this->foto);
        }
        return null;
    }
}
