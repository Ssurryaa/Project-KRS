<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

// use App\Model\

class DosenController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('dosen.krs_mahasiswa', compact('mahasiswas'));
    }


    public function pengajuanKRS($id)
    {
        $data = Transaksi::with('mahasiswa')->where('mahasiswa_id', $id)->get();
        $mahasiswas = Mahasiswa::where('id', $id)->first();
        return view('dosen.pengajuan')->with(compact('data', 'mahasiswas'));
    }

    public function accept($id, Request $request){
        $temp= Transaksi::find($id);

        $temp->update([
             'nilai'=>$request->nilai
        ]);
        //return redirect()->route('pengajuanKRS');
        return redirect('krs_mahasiswa');

   }

   public function khs()
    {
        $mahasiswas = Mahasiswa::all();
        return view('dosen.khs_mahasiswa', compact('mahasiswas'));
    }

    public function penilaiankhs($id)
    {
        $data = Transaksi::with('mahasiswa')->where('mahasiswa_id', $id)->get();
        $mahasiswas = Mahasiswa::where('id', $id)->first();
        return view('dosen.penilaian')->with(compact('data', 'mahasiswas'));
    }

    public function penilaian($id, Request $request){
        $temp= Transaksi::find($id);

        $temp->update([
             'nilai'=>$request->nilai
        ]);
        //return redirect()->route('pengajuanKRS');
        return redirect('khsmahasiswa');

   }


}
