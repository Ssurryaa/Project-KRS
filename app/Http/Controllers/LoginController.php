<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return redirect()->intended(route('profile'));
        } else {
            return back()->with('login_error','Username atau Password Salah');
        }
    }
}
