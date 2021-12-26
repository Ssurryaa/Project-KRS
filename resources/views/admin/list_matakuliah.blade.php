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
                                        <li class="breadcrumb-item active"><a href="\matakuliah" class="breadcrumb-link">Matakuliah</a></li>
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
                                @if(auth()->user()->role == "admin")
                                    <p>Silahkan tambah, edit, ataupun delete data Mata Kuliah</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if(auth()->user()->role == "admin")
                                    <a class="btn btn-primary mb-2" href="/addmatakuliah">Add Mata Kuliah</a>
                                    @if(session()->has('success'))
                                        <div class="alert alert-success mt-2">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
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
                                                @if(auth()->user()->role == "admin")
                                                    <th>Action</th>
                                                @endif
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
                                                @if(auth()->user()->role == "admin")
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
                                                @endif
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