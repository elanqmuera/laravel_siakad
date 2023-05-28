<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelLogin extends Model
{
    use HasFactory;
    public function checkNik($nip){
        return DB::table('dosen')->where('nip',$nip)->first();
    }
    public function checkEmail($nik){
        return DB::table('admin')->where('nik',$nik)->first();
    }

}
