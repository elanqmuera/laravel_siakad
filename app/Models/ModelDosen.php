<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelDosen extends Model
{
    use HasFactory;

    public function allData()
    {
        return DB::table('dosen')
            ->leftJoin('matkul', 'matkul.id_matkul', '=', 'dosen.id_matkul')
            ->get();
    }
}
