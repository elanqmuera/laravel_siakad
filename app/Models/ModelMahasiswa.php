<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelMahasiswa extends Model
{
    protected $table = 'mahasiswa'; 
    use HasFactory;
    
    public function allData(){
        // return DB::table('mahasiswa')
        // ->leftJoin('kelas', 'kelas.id_kelas', '=', 'mahasiswa.id_kelas')
        // ->leftJoin('matkul', 'matkul.id_matkul', '=', 'mahasiswa.id_matkul')
        // ->get();

      return DB::select('select * from mahasiswa LEFT JOIN kelas
 ON kelas.id_kelas = mahasiswa.id_kelas LEFT JOIN matkul ON matkul.id_matkul = mahasiswa.id_matkul');
    }

   
    public function toKelas()
    {
        return $this->belongsTo(ModelKelas::class);
    }
}
