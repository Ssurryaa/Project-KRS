@extends('layout.main')

@section('title', 'Matakuliah')
@section('header', 'Matakuliah')

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
                            <h2 class="pageheader-title">Matakuliah</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="\matakuliah" class="breadcrumb-link">Matakuliah</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Edit Matakuliah</a></li>
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
                                    <form action="{{ Route('saveeditmatkul', $matkul->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="kode" class="form-label">Kode</label>
                                            <input type="text" class="form-control" id="name" name="kode" value="{{$matkul->kode}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_matakuliah" class="form-label">Mata Kuliah</label>
                                            <input type="text" class="form-control" id="name" name="nama_matakuliah" value="{{$matkul->nama_matakuliah}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="semester" class="form-label">Semester</label>
                                            <input type="text" class="form-control" id="name" name="semester" value="{{$matkul->semester}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="sks" class="form-label">SKS</label>
                                            <input type="text" class="form-control" id="name" name="sks" value="{{$matkul->sks}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="prodis" class="form-label">Program Studi</label>
                                            <select class="form-control" name="prodis" id="prodis">
                                                <option disabled selected>Pilih Program Studi</option>
                                                    @foreach ($prodis as $prodi)
                                                        <option value="{{ $prodi->id }}"
                                                            {{ old('prodis', $matkul->prodi_id) == $prodi->id ? 'selected' : '' }}>
                                                            {{ $prodi->nama_prodi }}
                                                        </option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dosens" class="form-label">Dosen Pengampu</label>
                                            <select class="form-control" name="dosens" id="dosens">
                                                <option disabled selected>Pilih Dosen Pengampu</option>
                                                    @foreach ($dosens as $dosen)
                                                        <option value="{{ $dosen->id }}"
                                                            {{ old('dosens', $matkul->dosen_id) == $dosen->id ? 'selected' : '' }}>
                                                            {{ $dosen->nama }}
                                                        </option>
                                                    @endforeach
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_mk" class="form-label">Status Mata Kuliah</label>
                                            <select class="form-control" name="status_mk" id="status_mk">
                                                <option disabled selected>Pilih Program Studi</option>
                                                    @foreach ($status_mk as $item)
                                                        <option value="{{ $item }}"
                                                            {{ old('status_mk', $matkul->status_mk) == $item ? 'selected' : '' }}>
                                                            {{ $item }}</option>
                                                    @endforeach
                                            </select>
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