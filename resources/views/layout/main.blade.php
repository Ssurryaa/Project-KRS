<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/datatables/css/fixedHeader.bootstrap4.css')}}">
    <title>Dashboard @yield('title')</title>
</head>
<body>
    <div class="dashboard-main-wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        @yield('contents')
    </div>

    <script src="{{URL::asset('assets/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{URL::asset('assets/slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{URL::asset('assets/libs/js/main-js.js')}}"></script>
    <script src="{{URL::asset('assets/multi-select/js/jquery.multi-select.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{URL::asset('assets/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{URL::asset('assets/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/datatables/js/data-table.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
</body>
</html>
