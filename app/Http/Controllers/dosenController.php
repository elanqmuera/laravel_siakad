<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dosenController extends Controller
{
    public function index (){
        return view('admin.dosen.indexDosen');
    }
}
