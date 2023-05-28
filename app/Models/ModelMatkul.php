<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelMatkul extends Model
{
    use HasFactory;

    public function dataMatkul()
    {

        return DB::table('matkul')
            ->get();
    }

    public function dosenMatkul()
    {

        return DB::select('select * from matkul LEFT JOIN dosen
 ON dosen.id_matkul = matkul.id_matkul ');
    }

    // public function editMatkul($id){
    //     return  DB::select('select * from matkul where id ='.$id);
    // }

    public function detailData($id_matkul)
    {
        return DB::table('dosen')
            ->join('matkul', 'matkul.id_matkul', '=', 'dosen.id_matkul')
            // ->select('dosen.*')
            ->where('dosen.id_matkul', $id_matkul)
            ->get();
    }
    public function detailMatkul($id_matkul)
    {
        return DB::table('dosen')
            ->join('matkul', 'matkul.id_matkul', '=', 'dosen.id_matkul')
            // ->select('dosen.*')
            ->where('dosen.id_matkul', $id_matkul)
            ->first();
    }
}
