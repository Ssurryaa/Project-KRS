@extends('layout.main')

@section('title', 'KRS')
@section('header', 'KRS')

@section('contents')
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
                                                    <form action="{{ route('penilaian',['id' =>$dataa->id]) }}" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                <select class="form-control" aria-label="nilai" name='nilai' id="nilai" required>
                                                                    <option selected value="">Pilih Nilai</option>
                                                                    <option value="A">A (Sangat Baik)</option>
                                                                    <option value="B">B (Baik)</option>
                                                                    <option value="C">C (Cukup)</option>
                                                                    <option value="D">D (Kurang)</option>
                                                                    <option value="E">E (Buruk)</option>
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