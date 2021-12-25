<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dashboard;

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
                return redirect()->intended(route('dashboard'));
            }
            elseif(Auth::user()->role == "dosen"){
                return redirect()->intended(route('dashboard'));
            }
            elseif(Auth::user()->role == "admin"){
                return redirect()->intended(route('dashboard'));
            }
        } else {
            return back()->with('login_error','Username atau Password Salah');
        }
    }

    public function dashboard(){
        $dashboard = Dashboard::all();
        return view('dashboard', compact('dashboard'));
    }

    public function editdashboard($id){
        $dashboards=Dashboard::find($id);
        return view('editdashboard')->with(compact('dashboards'));
    }

    public function savedashboard(Request $request, $id){
        $data = array(
            'pengumuman' => $request->pengumuman
        );
        
        $dashboard=Dashboard::find($id);
        $dashboard->update($data);
        return redirect('dashboard');
    }
}
