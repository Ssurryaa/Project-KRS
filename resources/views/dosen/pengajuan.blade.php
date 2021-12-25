@extends('layout.main')

@section('title', 'KRS Mahasiswa')
@section('header', 'KRS Mahasiswa')

@section('contents')
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">KRS Mahasiswa</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="\krs_mahasiswa" class="breadcrumb-link">KRS Mahasiswa</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Pengajuan</a></li>
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
                                <h5 class="mb-0">KRS Mahasiswa</h5>
                                <p>Silahkan Terima/Tunda KRS Mahasiswa!</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Mata Kuliah</th>
                                                <th>SKS</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dataa)
                                            <tr data-aos="fade-in" data-aos-delay="1000">
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{$dataa->tahun_ajaran}}</td>
                                                <td>{{$dataa->semester}}</td>
                                                <td>{{$dataa->matkul->nama_matakuliah}}</td>
                                                <td>{{$dataa->matkul->sks}}</td>
                                                <td>{{$dataa->nilai}}</td>
                                                <td>
                                                    <form action="{{ route('krsaccept',['id' =>$dataa->id]) }}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <select class="form-control" aria-label="nilai" name='nilai' id="nilai" required>
                                                                    <option selected value="">Pilih Nilai</option>
                                                                    <option value="Tunda">Tunda</option>
                                                                    <option value="Terima">Terima</option>
                                                                </select>
                                                                <input type="submit" class="btn btn-sm btn-primary" value="Submit">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
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