<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelDosen;
use App\Models\ModelTugas;
use Illuminate\Http\Request;

class Tugas_DosenController extends Controller
{
    private $tugas;
    private $pertemuan;
    private $dosen;

    public function __construct()
    {
        $this->tugas = new ModelTugas();
        $this->dosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'tugas' => $this->tugas->tugasDosen(),
        ];

        return view('tugasdosen.index', $data);
    }
}
