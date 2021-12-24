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
    <div class="col-12">
      <div class="card">
        <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Tambahkan KRS</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
         <form action="{{ route('krs.edit.save',['id' => $data->id]) }}" method="POST" class="form-horizontal" id="validate" role="form">
         @csrf
          <div class="card-body">
            {{-- <div class="form-group row">
              <label for="nik" class="col-sm-2 col-form-label">NIM</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name='nim' id="nim" placeholder="NIM" required title="*Penghasilan Harus Diisi">
              </div>
            </div> --}}
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" value="{{$data->mahasiswa->nama}}" class="form-control" name='nama' id="nama" placeholder="Nama Lengkap" required title="" readonly>
              </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                <div class="col-sm-10">
                  <input type="text" value="{{$data->tahun_ajaran}}" class="form-control" name='tahun_ajaran' id="tahun_ajaran" placeholder="Tahun Ajaran Ex. 2020" required>
                </div>
            </div>
            <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-2 col-form-label">Matakuliah</label>
              <div class="col-sm-10">
                  <p>Sebelumnya : {{ $data->matkul->nama_matakuliah }}</p>
                <select class="form-control" aria-label="MataKuliah" name='matakuliah' id="matakuliah" required>
                  <option selected value="">Open this select menu</option>
                  @foreach ($matkul as $item)
                    <option value="{{$item->id}}">{{$item->nama_matakuliah}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-2 col-form-label">Semester</label>
              <div class="col-sm-10">
                <p>Sebelumnya : {{ $data->semester }}</p>
                <select class="form-control" aria-label="semester" name='semester' id="semester" required>
                  <option selected value="">Open this select menu</option>
                  <option value="1">1 (Satu)</option>
                  <option value="2">2 (Dua)</option>
                  <option value="3">3 (Tiga)</option>
                  <option value="4">4 (Empat)</option>
                  <option value="5">5 (Lima)</option>
                  <option value="6">6 (Enam)</option>
                  <option value="7">7 (Tujuh)</option>
                  <option value="8">8 (Delapan)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                <p>Sebelumnya : {{ $data->nilai }}</p>
                    <select class="form-control" aria-label="nilai" name='nilai' id="nilai" required>
                        <option selected value="">Pilih Nilai</option>
                        <option value="A">A (Sangat Baik)</option>
                        <option value="B">B (Baik)</option>
                        <option value="C">C (Cukup)</option>
                        <option value="D">D (Kurang)</option>
                        <option value="E">E (Buruk)</option>
                    </select>
                </div>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
         <a href="{{ route('krs.index') }}" class="btn btn-default ">Cancel</a>
         <input type="submit" class="btn btn-primary" name="submit">
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      </div>
      </div>
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
</div>
    </div>
</div>
@endsection

