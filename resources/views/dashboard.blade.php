@extends('layout.main')

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
                            <h2 class="pageheader-title">Sistem Inforamsi KRS</h2>
                            <p>Selamat Datang di Sistem Informasi KRS</p>
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
                                @foreach ($dashboard as $dashboards) 
                                @if(auth()->user()->role == "admin")
                                    <form action="{{ Route('editdashboard', $dashboards->id) }}" method="post">
                                    @csrf
                                        <h3 class="mb-0">Pengumuman!
                                            <input type="submit" class="btn btn-sm btn-primary" value="Edit">
                                        </h3>
                                    </form>
                                @endif
                                @if(auth()->user()->role == "mahasiswa")
                                    <h3 class="mb-0">Pengumuman!
                                @endif
                                @if(auth()->user()->role == "dosen")
                                    <h3 class="mb-0">Pengumuman!
                                @endif 
                                    
                                @endforeach
                            </div>
                            <div class="card-body">
                                @foreach ($dashboard as $dashboards)
                                    <p >{{$dashboards->pengumuman}}</p>
                                @endforeach
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