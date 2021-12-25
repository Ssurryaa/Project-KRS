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
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Add Dosen</a></li>
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
                                    <form action="/savedosen" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Foto</label>
                                            <input class="form-control" type="file" id="image" name="foto_dosen" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text" class="form-control" id="name" name="nip" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name" name="nama" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="name" name="alamat" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telepon" class="form-label">Telepon</label>
                                            <input type="text" class="form-control" id="name" name="telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-select">Program Studi</label>
                                            <select class="form-control" name="prodis" id="prodis">
                                            <option selected value="">Pilih Program Studi</option>
                                              @foreach ($prodis as $prodi)
                                                  <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <a type="button" class="btn btn-danger" href="listdosen">Back</a>
                                        <input type="submit" class="btn btn-success">
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