@extends('layout.main')

@section('title', 'Data Mahasiswa')
@section('header', 'Data Mahasiswa')

@section('contents')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Mahasiswa</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="\listmahasiswa" class="breadcrumb-link">Data Mahasiswa</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Edit Mahasiswa</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Kartu Rencana Studi</h5>
                                <p></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ Route('saveedit', $mahasiswa->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="image" class="form-label col-lg-12">Foto Mahasiswa</label>
                                            <img src="{{ url('foto_mahasiswa/'.$mahasiswa->foto_mahasiswa) }}" alt="Mahasiswa Image" class="rounded mb-2" width="auto" height="100">
                                            <input class="form-control col-lg-3" type="file" id="image" name="foto_mahasiswa" value="{{ $mahasiswa->foto_mahasiswa }}">
                                            <input type="hidden" class="form-control" id="hidden_image" name="hidden_foto_mahasiswa" value="{{$mahasiswa->foto_mahasiswa}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nim" class="form-label">NIM</label>
                                            <input type="text" class="form-control" id="name" name="nim" value="{{$mahasiswa->nim}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="name" name="nama" value="{{$mahasiswa->nama}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="name" name="alamat" value="{{$mahasiswa->alamat}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" id="name" name="telepon" value="{{$mahasiswa->telepon}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="prodis" class="form-label">Program Studi</label>
                                            <select class="form-control" name="prodis" id="prodis">
                                                <option disabled selected>Pilih Program Studi</option>
                                                    @foreach ($prodis as $prodi)
                                                        <option value="{{ $prodi->id }}"
                                                            {{ old('prodis', $mahasiswa->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                                            {{ $prodi->nama_prodi }}
                                                        </option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="angkatan" class="form-label">Angkatan</label>
                                            <input type="text" class="form-control" id="name" name="angkatan" value="{{$mahasiswa->angkatan}}" >
                                        </div>
                                        <a type="button" class="btn btn-danger" href="/">Back</a>
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
@endsection