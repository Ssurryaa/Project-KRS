@extends('layout.main')

@section('title', 'Profile')
@section('header', 'Profile')

@section('contents')
      <div class="dashboard-wrapper">
        <div class="profile">
          <div class="container-fluid dashboard-content ">
              <!-- ============================================================== -->
              <!-- pageheader -->
              <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h3 class="mb-2"> Profil Mahasiswa </h3>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Profil Mahasiswa</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- ============================================================== -->
              <!-- end pageheader -->
              <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- content -->
                <!-- ============================================================== -->
                  <div class="row">
                      <!-- ============================================================== -->
                      <!-- profile -->
                      <!-- ============================================================== -->
                      <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                          <!-- ============================================================== -->
                          <!-- card profile -->
                          <!-- ============================================================== -->
                          <div class="card">
                              <div class="card-body">
                                  <div class="user-avatar text-center d-block">
                                      <img src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                  </div>
                                  <div class="text-center">
                                      <h2 class="font-24 mb-0">Dita</h2>
                                      <p>Mahasiswa Aktif</p>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end card profile -->
                          <!-- ============================================================== -->
                      </div>
                      <!-- ============================================================== -->
                      <!-- end profile -->
                      <!-- ============================================================== -->
                      <!-- ============================================================== -->
                      <!-- campaign data -->
                      <!-- ============================================================== -->
                      <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                          <!-- ============================================================== -->
                          <!-- campaign tab one -->
                          <!-- ============================================================== -->
                          <div class="influence-profile-content pills-regular">
                              <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Data Mahasiswa</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Edit Profile</a>
                                  </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                                  <div class="row">
                                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                          <div class="section-block">
                                              <h3 class="section-title">Data Mahasiswa</h3>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                  <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                                      <div class="card">
                                          <h5 class="card-header">Send Messages</h5>
                                          <div class="card-body">
                                              <form>
                                                  <div class="row">
                                                      <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                                          <div class="form-group">
                                                              <label for="name">Your Name</label>
                                                              <input type="text" class="form-control form-control-lg" id="name" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="email">Your Email</label>
                                                              <input type="email" class="form-control form-control-lg" id="email" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="subject">Subject</label>
                                                              <input type="text" class="form-control form-control-lg" id="subject" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="messages">Messgaes</label>
                                                              <textarea class="form-control" id="messages" rows="3"></textarea>
                                                          </div>
                                                          <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- ============================================================== -->
                          <!-- end campaign tab one -->
                          <!-- ============================================================== -->
                      </div>
                      <!-- ============================================================== -->
                      <!-- end campaign data -->
                      <!-- ============================================================== -->
                  </div>
              </div>
          </div>
        </div>
          <!-- ============================================================== -->
          <!-- end content -->
          <!-- ============================================================== -->
        </div>
      </div>
@endsection



