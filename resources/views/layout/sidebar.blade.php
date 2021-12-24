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
                            <li class="nav-item ">
                                <a class="nav-link" href="\dashboard"><i class="fas fa-fw fa-th-list"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\profile"><i class="fa fa-fw fa-user-circle"></i>Profil</a>
                            </li>
                            @if(Auth::user()->role == 'mahasiswa')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('krs.index')}}"><i class="fas fa-fw fa-clone"></i>KRS</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="\khs"><i class="fas fa-fw fa-file"></i>KHS</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="\khs"><i class="fa fa-fw fa-book"></i>Mata Kuliah</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'dosen')
                            <li class="nav-item">
                                <a class="nav-link" href="\krs_mahasiswa"><i class="fa fa-fw fa-address-book"></i>KRS Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\khs"><i class="fa fa-fw fa-address-book"></i>KHS Mahasiswa</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="\listmahasiswa"><i class="fa fa-fw fa-address-book"></i>Data Mahasiswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\listdosen"><i class="fa fa-fw fa-id-badge"></i>Data Dosen</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="\matakuliah"><i class="fa fa-fw fa-book"></i>Mata Kuliah</a>
                            </li>
                            @endif
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