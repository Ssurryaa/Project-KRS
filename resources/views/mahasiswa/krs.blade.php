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
                            <h2 class="pageheader-title">Kartu Rencana Studi</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Charts</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sparkline</li>
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
                                    @if (Auth::user()->role == "mahasiswa")
                                        @if ($datas <= 20)
                                            <a class = "btn btn-primary mb-2" href="{{route('krs.add')}}">Pengajuan KRS</a>  
                                        @elseif ($datas > 20)
                                            <h5>SKS Sudah Mencapai Batas, Tidak Bisa Mengajukan Matakuliah</h5>
                                        @endif
                                    {{-- @elseif (Auth::user()->role == "admin")
                                        <a class = "btn btn-primary" href="{{route('krs.add')}}">Pengajuan KRS</a>   --}}
                                    @endif
                                    <a class = "btn btn-success mb-2" href="{{route('cetakkrs')}}">Cetak KRS</a>
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>SKS</th>
                                                <th>Matakuliah</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dataa)
                                            
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$dataa->tahun_ajaran}}</td>
                                                    <td>{{$dataa->semester}}</td>
                                                    {{-- {{dd($dataa->mahasiswa())}} --}}
                                                    <td>{{$dataa->mahasiswa->nama}}</td>
                                                    <td>{{$dataa->matkul->sks}}</td>
                                                    <td>{{$dataa->matkul->nama_matakuliah}}</td>
                                                    <td>{{$dataa->nilai}}</td>
                                                   <td>
                                                        @if(auth()->user()->role == "mahasiswa")
                                                            <form action="{{ route('krs.delete',['id' => $dataa->id]) }}" method="post">
                                                                @csrf
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                            </form>
                                                        @elseif (auth()->user()->role == "dosen")
                                                            @if ($dataa->nilai == "Terima")
                                                                <form action="{{ route('krs.penilaian',['id' =>$dataa->id]) }}) }}" method="post">
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
                                                            @elseif($dataa->nilai == "Tunda")
                                                                <form action="{{ route('krs.accept',['id' =>$dataa->id]) }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="terima" id="terima" value="Terima">
                                                                    <input type="submit" class="btn btn-sm btn-success" value="Terima">

                                                                </form>
                                                            @else
                                                                <p>Berhasil Dinilai</p>
                                                            @endif
                                                        @elseif (auth()->user()->role == "admin")
                                                            <a href="{{ route('krs.edit',['id'=>$dataa->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('krs.delete',['id' => $dataa->id]) }}" method="post">
                                                                @csrf
                                                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>

                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>SKS</th>
                                                <th>Matakuliah</th>
                                                @if (Auth::user()->role == "mahasiswa")
                                                <th>Total SKS : <b>{{ $datas }}</b></th>
                                                @endif
                                            </tr>
                                        </tfoot>
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
