<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaksi;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
   public function index(){
     //    dd();
     if (Auth::check()){
          if(Auth::user()->role == "admin"){
               $data = Transaksi::all();
               return view('mahasiswa.krs', compact('data'));

          }elseif(Auth::user()->role == "mahasiswa"){
               $data = Transaksi::where('mahasiswa_id','=',Auth::user()->id)->get();
               $datas = Transaksi::with('matkul')->where('mahasiswa_id','=',Auth::user()->id)->get()->pluck('matkul.sks')->sum();
               // dd($datas);
               return view('mahasiswa.krs', compact('data','datas'));

          }elseif(Auth::user()->role == "dosen"){
               // Ubah disini jika foreign key telah di ubah
               $data = Transaksi::join('matakuliahs', 'trx_krss.id','=','matakuliahs.id')->where('matakuliahs.dosen_id', '=',Auth::user()->id)->get();
               // dd($data);
               return view('mahasiswa.krs', compact('data'));
          }else{
               $data = "Anda tidak memiliki role";
               return view('mahasiswa.krs', compact('data'));

          }
     }
        
   }

   public function add(){
     $datas = Transaksi::with('matkul')->where('mahasiswa_id','=',Auth::user()->id)->get()->pluck('matkul.sks')->sum();
     if($datas <= 20){
          $matkul = Matakuliah::all();
          return view('krs.add', compact('matkul'));
     }else{
        return redirect()->route('krs.index');
     }
       
   }

     public function addSave(Request $request){
          $tahun_ajaran = date('Y');
          //    dd(Auth::user()->id);

          // $tahun_ajaran = Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;
          Transaksi::create([
               'tahun_ajaran' => $tahun_ajaran,
               'semester' => $request->semester,
               'mahasiswa_id' => Auth::user()->id,
               'matakuliah_id' => $request->matakuliah,
               'nilai' => "Tunda"
          ]);
          return redirect()->route('krs.index');
     }

     public function edit($id){
          $data = Transaksi::find($id);
          $matkul = Matakuliah::all();

          return view('krs.edit', compact('data', 'matkul'));

     }

     public function editSave($id, Request $request){
          $temp= Transaksi::find($id);

          $temp->update([
               'tahun_ajaran' =>$request->tahun_ajaran,
               'semester' => $request->semester,
               'matakuliah_id' => $request->matakuliah,
               'nilai'=>$request->nilai
          ]);
          return redirect()->route('krs.index');
     }

     public function delete($id){
          $data = Transaksi::find($id);
          

          $data->delete();
          return redirect()->route('krs.index');
     }

     public function accept($id, Request $request){
          $temp= Transaksi::where('id','=',$id)->get()->first();

          $temp->update([
               'nilai'=>$request->terima
          ]);
          return redirect()->route('krs.index');

     }

     public function penilaian($id, Request $request){
          $temp= Transaksi::where('id','=',$id)->get()->first();

          $temp->update([
               'nilai'=>$request->nilai
          ]);
          return redirect()->route('krs.index');

     }

     public function cetakkrs()
     {
          $data = Transaksi::all();
          return view('mahasiswa.cetakkrs', compact('data'));
          //$data = Transaksi::with('mahasiswa')->where('mahasiswa_id','=',Auth::user()->id)->get();
          //$mahasiswas = Mahasiswa::where('id', $id)->first();
          //return view('mahasiswa.cetakkrs')->with(compact('data', 'mahasiswas'));
     }
}

