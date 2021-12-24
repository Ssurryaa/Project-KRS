@extends('layout.main')

@section('title', 'KRS')
@section('header', 'KRS')

@section('contents')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
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
                                    <a class="btn btn-primary mb-2" href="/addmahasiswa">Add Mahasiswa</a>
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
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Prodi</th>
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
                                                <td>{{ $mahasiswa->prodis->nama_prodi }}</td>
                                                <td>{{ $mahasiswa->angkatan }}</td>
                                                <td>
                                                    <form action="/{{ $mahasiswa->id }}/delete" method="post">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            @csrf
                                                            <a type="button" class="btn btn-success" href="{{ Route('detailmahasiswa', $mahasiswa->id) }}">Details</a>
                                                            <a type="button" class="btn btn-primary" href="{{ Route('editmahasiswa', $mahasiswa->id) }}">Edit</a>
                                                            <button type="submit" class="btn btn-danger"  onclick="return confirm('Yakin Ingin Mengapus Data {{ $mahasiswa->nama }}?')">Delete</button>
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