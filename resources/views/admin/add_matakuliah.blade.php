@extends('layout.main')

@section('title', 'KRS')
@section('header', 'KRS')

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
                                <div class="table-responsive">
                                    <form action="/savematakuliah" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="kode" class="form-label">Kode</label>
                                            <input type="text" class="form-control" id="name" name="kode" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah</label>
                                            <input type="text" class="form-control" id="name" name="nama_matakuliah" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <input type="text" class="form-control" id="name" name="semester" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sks" class="form-label">SKS</label>
                                            <input type="text" class="form-control" id="name" name="sks" required>
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
                                        <div class="form-group">
                                            <label for="input-select">Dosen Pengampu</label>
                                            <select class="form-control" name="dosens" id="dosens">
                                            <option selected value="">Pilih Dosen Pengampu</option>
                                              @foreach ($dosens as $dosen)
                                                  <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_mk" class="form-label">Status Mata Kuliah</label>
                                            <select class="form-control" name="status_mk" id="status_mk">
                                            <option selected value="">Pilih Program Studi</option>
                                              @foreach ($status_mk as $item)
                                                  <option value="{{ $item }}">{{ $item }}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                        <a type="button" class="btn btn-danger" href="/matakuliah">Back</a>
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