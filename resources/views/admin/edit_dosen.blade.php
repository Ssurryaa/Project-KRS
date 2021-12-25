@extends('layout.main')

@section('title', 'Dosen')
@section('header', 'Dosen')

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
                            <h2 class="pageheader-title">Dosen</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="\listdosen" class="breadcrumb-link">Data Dosen</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Edit Dosen</a></li>
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
                                    <form action="{{ Route('saveeditdosen', $dosen->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="foto_dosen" class="form-label col-lg-12">Foto Dosen</label>
                                            <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" alt="Dosen Image" class="rounded mb-2" width="auto" height="100">
                                            <input class="form-control col-lg-3" type="file" id="image" name="foto_dosen" value="{{ $dosen->foto_dosen }}">
                                            <input type="hidden" class="form-control" id="hidden_image" name="hidden_foto_dosen" value="{{$dosen->foto_dosen}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text" class="form-control" id="name" name="nip" value="{{$dosen->nip}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Dosen</label>
                                            <input type="text" class="form-control" id="name" name="nama" value="{{$dosen->nama}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="name" name="alamat" value="{{$dosen->alamat}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" id="name" name="telepon" value="{{$dosen->telepon}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="prodis" class="form-label">Program Studi</label>
                                            <select class="form-control" name="prodis" id="prodis">
                                                <option disabled selected>Pilih Program Studi</option>
                                                    @foreach ($prodis as $prodi)
                                                        <option value="{{ $prodi->id }}"
                                                            {{ old('prodis', $dosen->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                                            {{ $prodi->nama_prodi }}
                                                        </option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <a type="button" class="btn btn-danger" href="/listdosen">Back</a>
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