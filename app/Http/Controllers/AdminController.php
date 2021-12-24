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

class AdminController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('admin.list_mahasiswa', compact('mahasiswas'));
    }
    public function addmahasiswa()
    {
        $prodis=ProgramStudi::all();
        return view('admin.add_mahasiswa', compact('prodis'));
    }
    public function savemahasiswa(Request $request)
    {   
        $request->validate([
            'foto_mahasiswa' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'prodis' => 'required',
            'angkatan' => 'required'
        ]);
        
        $extension = $request->file('foto_mahasiswa');
        $imgname = rand().".".$extension->getClientOriginalExtension();

        $data = array(
            'foto_mahasiswa' => $imgname,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'prodi_id' => $request->prodis,
            'angkatan' => $request->angkatan
        );

        $extension->move(public_path('foto_mahasiswa'),$imgname);
        
        Mahasiswa::create($data);
        return redirect('listmahasiswa')->withSuccess("Data Mahasiswa Berhasil Ditambahkan", $extension);

    }
    public function detailmahasiswa($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('admin.detail_mahasiswa', compact('mahasiswa'));
    }

    public function editmahasiswa($id)
    {
        $prodis = ProgramStudi::all();
        $mahasiswa = Mahasiswa::find($id);
        return view('admin.edit_mahasiswa')->with(compact('prodis', 'mahasiswa'));
    }

    public function saveedit(Request $request, $id)
    {
        $request->validate([
            'foto_mahasiswa' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'prodis' => 'required',
            'angkatan' => 'required'
        ]);

        $old_image= $request->hidden_image;
        $image_name=$old_image;
        $extension = $request->file('foto_mahasiswa');
        $imgname = rand().".".$extension->getClientOriginalExtension();

        $data = array(
            'foto_mahasiswa' => $imgname,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'prodi_id' => $request->prodis,
            'angkatan' => $request->angkatan
        );

        $extension->move(public_path('foto_mahasiswa'),$imgname);
        
        $mahasiswa=Mahasiswa::find($id);
        $mahasiswa->update($data);
       
        return redirect('listmahasiswa');
    }

    public function deletemahasiswa($id)
    {
        $mahasiswas = Mahasiswa::find($id);
        $mahasiswas->delete();
        return redirect('listmahasiswa');
    }

    public function dosen()
    {
        $dosens = Dosen::all();
        return view('admin.list_dosen', compact('dosens'));
    }
    public function adddosen()
    {
        $prodis=ProgramStudi::all();
        return view('admin.add_dosen', compact('prodis'));
    }
    public function savedosen(Request $request)
    {   
        $request->validate([
            'foto_dosen' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'prodis' => 'required'
        ]);
        
        $extension = $request->file('foto_dosen');
        $imagename = rand().".".$extension->getClientOriginalExtension();

        $data = array(
            'foto_dosen' => $imagename,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'prodi_id' => $request->prodis,
        );

        $extension->move(public_path('foto_dosen'),$imagename);
        
        Dosen::create($data);
        return redirect('listdosen')->withSuccess("Data Dosen Berhasil Ditambahkan", $extension);

    }
    public function detaildosen($id)
    {
        $dosen = Dosen::find($id);
        return view('admin.detail_dosen', compact('dosen'));
    }

    public function editdosen($id)
    {
        $prodis = ProgramStudi::all();
        $dosen = Dosen::find($id);
        return view('admin.edit_dosen')->with(compact('prodis', 'dosen'));
    }

    public function saveeditdosen(Request $request, $id)
    {
        $request->validate([
            'foto_dosen' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'prodis' => 'required'
        ]);

        $old_image= $request->hidden_image;
        $image_name=$old_image;
        $extension = $request->file('foto_dosen');
        $imagename = rand().".".$extension->getClientOriginalExtension();

        $data = array(
            'foto_dosen' => $imagename,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'prodi_id' => $request->prodis,
        );

        $extension->move(public_path('foto_dosen'),$imagename);
        
        $dosen=Dosen::find($id);
        $dosen->update($data);
       
        return redirect('listdosen');
    }

    public function deletedosen($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect('listdosen');
    }
}
