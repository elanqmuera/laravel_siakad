<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelLogin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {

        if (Session()->get('id_dosen')) {
            return redirect()->route('dashboard');
        }

        // buat dashboard
        // if (!Session()->get('id_dosen')) {
        //     return redirect()->route('login');
        // }

        return view('login');
    }
    public function proses(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'nip' => 'required|numeric|',
                'password' => 'required|min:8',
            ],
            [
                'nip.required' => 'Kolom nip harus diisi.',
                'nip.numeric'  => 'NIM harus angka!',
                'password.required' => 'Kolom password harus diisi.',
                'password.min' => 'Kolom password harus terdiri dari minimal :min karakter.',
            ]
        )->validate();

        $modelLogin = new ModelLogin();
        $dosen = $modelLogin->checkNik(Request()->nip);
        if ($dosen) {
            if (Hash::check(Request()->password, $dosen->password)) {
                Session()->put('id_dosen', $dosen->id_dosen);
                Session()->put('nip', $dosen->nip);
                Session()->put('nama_dosen', $dosen->nama_dosen);
                Session()->put('email', $dosen->email);
                Session()->put('foto', $dosen->foto);
                Session()->put('id_role', $dosen->id_role);
                session(['berhasil_login' => true]);

                return redirect()->route('dashboard');
            } else {
                return back()->with('gagal', 'Login gagal! password tidak sesuai.');
            }
        } else {
            return back()->with('gagal', 'Login gagal! NIP atau NIK tidak sesuai.');
        }
        // $request->input('password') == $dosen->password
    }

    public function logout(Request $request)
    {
        Session()->forget('id_dosen');
        Session()->forget('nip');
        Session()->forget('nama_dosen');
        Session()->forget('email');
        Session()->forget('foto');
        Session()->forget('id_role');

        $request->session()->flush();

        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
