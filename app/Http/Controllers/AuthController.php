<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
   public function register(){
    return view('auth/register');
   }

   public function registerSimpan(Request $request){
    Validator::make($request->all(),[
        'nim' => 'required',
        'nama_mahasiswa' => 'required',
        'gender'=> 'required',
        'password' => 'required',
    ])->validate();

    MahasiswaModel::create([
        'nama_mahasiswa' => $request->nama_mahasiswa,
        'nim' => $request->nim,
        'gender' => $request->gender,
        'password' => $request->password,
        'foto' => $request->foto,

    ]);

    return redirect()->route('login');
   
}   
    public function login(){
        return view('auth/login');
    }

    public function loginAksi(Request $request) {
        Validator::make($request->all(),[
            'nim' =>'required',
            'password'=>'required'
        ])->validate();

        // if (!Auth::attempt($request->only('nim','password'),$request->boolean('remember'))) {
        //     throw ValidationException::withMessages([
        //         'nim' => trans('auth.failed')
        //     ]);
        // }
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }
}