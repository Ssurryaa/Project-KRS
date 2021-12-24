<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/circular-std/style.css">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a class="navbar-brand" href="#">Sistem KRS</a>
                <span class="splash-description">Silahkan Login Terlebih Dahulu.</span>
            </div>
            <div class="card-body">
                <form action="{{ route('post.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Username" value="{{ old('username') }}" autocomplete="off">
                        <div class="container text-danger d-flex justify-content-end p-0" style="font-size: 0.8em; height: 1.3em">
                          @if (session()->has('login_error'))
                              {{ session('login_error') }}
                          @endif
                          @error('username')
                              {{ $message }}
                          @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Password">
                        <div class="container text-danger d-flex justify-content-end p-0" style="font-size: 0.8em; height: 1.3em">
                            @error('password')
                                
                                {{ $message }}
                                
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>