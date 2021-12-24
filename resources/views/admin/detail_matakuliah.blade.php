@extends('layout.main')

@section('title', 'Detail Animal')
@section('header', 'Detail of Animal')

@section('contents')
    <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\profileadmin"><i class="fa fa-fw fa-user-circle"></i>Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\listmahasiswa"><i class="fa fa-fw fa-address-book"></i>Data Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\listdosen"><i class="fa fa-fw fa-id-badge"></i>Data Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="\matakuliah"><i class="fa fa-fw fa-book"></i>Mata Kuliah</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="\"><i class="fa fa-fw fa-arrow-left"></i>Keluar</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Dashboard</h2>
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
                                <p>This example shows DataTables and the Buttons extension being used with the Bootstrap 4 framework providing the styling.</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="kode" class="form-label">Kode</label>
                                    <input type="text" class="form-control" id="name" name="kode" value="{{$matkul->kode}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_matakuliah" class="form-label">Mata Kuliah</label>
                                    <input type="text" class="form-control" id="name" name="nama_matakuliah" value="{{$matkul->nama_matakuliah}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" class="form-control" id="name" name="semester" value="{{$matkul->semester}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="sks" class="form-label">SKS</label>
                                    <input type="text" class="form-control" id="name" name="sks" value="{{$matkul->sks}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="prodis" class="form-label">Program Studi</label>
                                    <input type="text" class="form-control" id="name" name="prodis" value="{{$matkul->prodis->nama_prodi}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="dosens" class="form-label">Dosen Pengampu</label>
                                    <input type="text" class="form-control" id="name" name="dosens" value="{{$matkul->dosens->nama}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="status_mk" class="form-label">Status Mata Kuliah</label>
                                    <input type="text" class="form-control" id="status_mk" name="status_mk" value="{{$matkul->status_mk}}" readonly>
                                </div>
                                <a type="button" class="btn btn-danger" href="\matakuliah">Back</a>
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