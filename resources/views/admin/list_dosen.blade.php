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
                                <a class="nav-link active" href="\listdosen"><i class="fa fa-fw fa-id-badge"></i>Data Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\matakuliah"><i class="fa fa-fw fa-book"></i>Mata Kuliah</a>
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
                                <h5 class="mb-0">Data Mahasiswa</h5>
                                <p>Silahkan tambah, edit, ataupun delete data mahasiswa</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <a class="btn btn-primary mb-2" href="/adddosen">Add Dosen</a>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Prodi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosens as $dosen)
                                            <tr data-aos="fade-in" data-aos-delay="1000">
                                                <th scope="row">{{ $loop->index+1 }}</th>
                                                <td><img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" alt="Dosen Image" class="media-avatar rounded" width="50px" height="50px" ></td>
                                                <td>{{ $dosen->nip }}</td>
                                                <td>{{ $dosen->nama }}</td>
                                                <td>{{ $dosen->alamat }}</td>
                                                <td>{{ $dosen->telepon }}</td>
                                                <td>{{ $dosen->prodis->nama_prodi }}</td>
                                                <td>
                                                    <form action="/{{ $dosen->id }}/deletedosen" method="post">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            @csrf
                                                            <a type="button" class="btn btn-success" href="{{ Route('detaildosen', $dosen->id) }}">Details</a>
                                                            <a type="button" class="btn btn-primary" href="{{ Route('editdosen', $dosen->id) }}">Edit</a>
                                                            <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin Ingin Mengapus Data {{ $dosen->nama }}?')">Delete</button>
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