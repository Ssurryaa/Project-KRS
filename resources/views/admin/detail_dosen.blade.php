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
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">KRS</a></li>
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
                                <div class="mb-3">
                                    <label for="image" class="form-label col-lg-12">Foto Dosen</label>
                                    <img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" alt="Dosen Image" class="rounded" width="auto" height="500">
                                </div>
                                <div class="mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" class="form-control" id="name" name="nip" value="{{$dosen->nip}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Dosen</label>
                                    <input type="text" class="form-control" id="name" name="nama" value="{{$dosen->nama}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="name" name="alamat" value="{{$dosen->alamat}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" class="form-control" id="name" name="telepon" value="{{$dosen->telepon}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="prodis" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="name" name="prodis" value="{{$dosen->prodis->nama_prodi}}" readonly>
                                </div>
                                <a type="button" class="btn btn-danger" href="\listdosen">Back</a>
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