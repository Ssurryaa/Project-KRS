@extends('layout.main')

@section('title', 'KRS Mahasiswa')
@section('header', 'KRS Mahasiswa')

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
                            <h2 class="pageheader-title">KRS Mahasiswa</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active"><a href="\krs_mahasiswa" class="breadcrumb-link">KRS Mahasiswa</a></li>
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
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Angkatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswas as $mahasiswa)
                                            <tr data-aos="fade-in" data-aos-delay="1000">
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td><img src="{{ url('foto_mahasiswa/'.$mahasiswa->foto_mahasiswa) }}" alt="Mahasiswa Image" class="media-avatar rounded" width="50px" height="50px" ></td>
                                                <td>{{ $mahasiswa->nim }}</td>
                                                <td>{{ $mahasiswa->nama }}</td>
                                                <td>{{ $mahasiswa->alamat }}</td>
                                                <td>{{ $mahasiswa->telepon }}</td>
                                                <td>{{ $mahasiswa->angkatan }}</td>
                                                <td>
                                                    <form action="/{{ $mahasiswa->id }}/delete" method="post">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            @csrf
                                                            <a type="button" class="btn btn-primary" href="{{ Route('pengajuanKRS', $mahasiswa->id) }}">Pengajuan KRS</a>
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