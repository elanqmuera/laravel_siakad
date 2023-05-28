<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelJurusan extends Model
{
    use HasFactory;

    public function dataJurusan() {
        return DB::select('select * from jurusan');
    }

}
