@extends('layout.main')

@section('title', 'KRS')
@section('header', 'KRS')

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
                                <h5 class="mb-0">Mata Kuliah</h5>
                                <p>Silahkan tambah, edit, ataupun delete data Mata Kuliah</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <a class="btn btn-primary mb-2" href="/addmatakuliah">Add Mata Kuliah</a>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode</th>
                                                <th>Mata Kuliah</th>
                                                <th>Semester</th>
                                                <th>SKS</th>
                                                <th>Prodi</th>
                                                <th>Dosen</th>
                                                <th>Status MK</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($matakuliahs as $matkul)
                                            <tr data-aos="fade-in" data-aos-delay="1000">
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td>{{ $matkul->kode }}</td>
                                                <td>{{ $matkul->nama_matakuliah }}</td>
                                                <td>{{ $matkul->semester }}</td>
                                                <td>{{ $matkul->sks }}</td>
                                                <td>{{ $matkul->prodis->nama_prodi }}</td>
                                                <td>{{ $matkul->dosens->nama }}</td>
                                                <td>{{ $matkul->status_mk }}</td>
                                                <td>
                                                    <form action="/{{ $matkul->id }}/deletematakuliah" method="post">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            @csrf
                                                            <a type="button" class="btn btn-success" href="{{ Route('detailmatakuliah', $matkul->id) }}">Details</a>
                                                            <a type="button" class="btn btn-primary" href="{{ Route('editmatakuliah', $matkul->id) }}">Edit</a>
                                                            <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin Ingin Mengapus Data {{ $matkul->nama_matakuliah }}?')">Delete</button>
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