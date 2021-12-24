<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class LoginController extends Controller
{

    public function index(){
        return view('mahasiswa.login');
    }

    public function login(){
        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)){
            request()->session()->regenerate();
            if(auth()->user()->role == 'mahasiswa'){
                return redirect()->intended(route('profile'));
            }
            elseif(Auth::user()->role == "dosen"){
                return redirect()->intended(route('krs_mahasiswa'));
            }
            elseif(Auth::user()->role == "admin"){
                return redirect()->intended(route('listmahasiswa'));
            }
        } else {
            return back()->with('login_error','Username atau Password Salah');
        }
    }
}
