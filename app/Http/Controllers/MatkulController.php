<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

// use App\Model\

class MatkulController extends Controller
{
    public function index()
    {
        $matakuliahs = MataKuliah::all();
        $dosens = Dosen::all();
        return view('admin.list_matakuliah', compact('matakuliahs', 'dosens'));
    }
    public function addmatakuliah()
    {
        $status_mk = MataKuliah::getEnumKey('status_mk');
        $dosens = Dosen::all();
        $prodis=ProgramStudi::all();
        return view('admin.add_matakuliah', compact('status_mk', 'dosens', 'prodis'));
    }
    public function savematakuliah(Request $request)
    {   
        $request->validate([
            'kode' => 'required',
            'nama_matakuliah' => 'required',
            'semester' => 'required',
            'sks' => 'required',
            'prodis' => 'required',
            'dosens' => 'required',
            'status_mk' => 'required'
        ]);
        
        $data = array(
            'kode' => $request->kode,
            'nama_matakuliah' => $request->nama_matakuliah,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'prodi_id' => $request->prodis,
            'dosen_id' => $request->dosens,
            'status_mk' => $request->status_mk
        );

        
        MataKuliah::create($data);
        return redirect('matakuliah')->withSuccess("Data Mata Kuliah Berhasil Ditambahkan");

    }
    public function detailmatakuliah($id)
    {
        $matkul = Matakuliah::find($id);
        return view('admin.detail_matakuliah', compact('matkul'));
    }

    public function editmatakuliah($id)
    {
        $status_mk = MataKuliah::getEnumKey('status_mk');
        $dosens = Dosen::all();
        $prodis = ProgramStudi::all();
        $matkul = MataKuliah::find($id);
        return view('admin.edit_matakuliah')->with(compact('status_mk', 'dosens', 'prodis', 'matkul'));
    }

    public function saveeditmatkul(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama_matakuliah' => 'required',
            'semester' => 'required',
            'sks' => 'required',
            'prodis' => 'required',
            'dosens' => 'required',
            'status_mk' => 'required'
        ]);
        
        $data = array(
            'kode' => $request->kode,
            'nama_matakuliah' => $request->nama_matakuliah,
            'semester' => $request->semester,
            'sks' => $request->sks,
            'prodi_id' => $request->prodis,
            'dosen_id' => $request->dosens,
            'status_mk' => $request->status_mk
        );
        
        $matkul=MataKuliah::find($id);
        $matkul->update($data);
       
        return redirect('matakuliah');
    }

    public function deletematakuliah($id)
    {
        $matkul = MataKuliah::find($id);
        $matkul->delete();
        return redirect('matakuliah');
    }
}
