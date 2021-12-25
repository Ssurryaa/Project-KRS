<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use App\Models\Dosen;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use DB;

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
        $data = $request->all();
        $prodis=ProgramStudi::all();
        $file           = $request->file('foto_mahasiswa');
        $nama_file      = $file->getClientOriginalName();
        $file->move('foto_mahasiswa',$file->getClientOriginalName());

        //dd($data);
        $users = new Users;
        $users->username = $data['nim'];
        $users->password = Hash::make($data['nim']);
        $users->role = "mahasiswa";
        $users->save();

        $mahasiswas = new Mahasiswa;
        $mahasiswas->foto_mahasiswa = $nama_file;
        $mahasiswas->nim = $data['nim'];
        $mahasiswas->nama = $data['nama'];
        $mahasiswas->alamat = $data['alamat'];
        $mahasiswas->telepon = $data['telepon'];
        $mahasiswas->prodi_id = $data['prodis'];
        $mahasiswas->user_id = $users['id'];
        $mahasiswas->angkatan = $data['angkatan'];
        $mahasiswas->save();

        return redirect('listmahasiswa')->withSuccess("Data Mahasiswa Berhasil Ditambahkan");

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
        $data = $request->all();
        $prodis=ProgramStudi::all();
        $file           = $request->file('foto_dosen');
        $nama_file      = $file->getClientOriginalName();
        $file->move('foto_dosen',$file->getClientOriginalName());

        //dd($data);
        $users = new Users;
        $users->username = $data['nip'];
        $users->password = Hash::make($data['nip']);
        $users->role = "dosen";
        $users->save();

        $dosens = new Dosen;
        $dosens->foto_dosen = $nama_file;
        $dosens->nip = $data['nip'];
        $dosens->nama = $data['nama'];
        $dosens->alamat = $data['alamat'];
        $dosens->telepon = $data['telepon'];
        $dosens->prodi_id = $data['prodis'];
        $dosens->user_id = $users['id'];
        $dosens->save();

        return redirect('listdosen')->withSuccess("Data Dosen Berhasil Ditambahkan");

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
