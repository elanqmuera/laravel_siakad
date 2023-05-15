<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelKelas extends Model
{
    use HasFactory;

    public function dataKelas() {
        return DB::select('select * from kelas');
    }

    public function kelasMahasiswa()
    {
        return $this->hasMany(ModelMahasiswa::class,);
    }
}
