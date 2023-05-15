<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelDosen extends Model
{
    use HasFactory;
    
   public function dataDosen () {
    return DB::select('select * from dosen');
   }
}
