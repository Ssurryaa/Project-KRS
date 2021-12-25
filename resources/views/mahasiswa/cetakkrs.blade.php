<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak KRS</title>
</head>
<body>
    <div class="form-group">
        <h2 align="center"><b>Kartu Rencana Studi</b></h2>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dataa)
                <tr data-aos="fade-in" data-aos-delay="1000">
                    <td align="center">{{ $loop->iteration }}</th>
                    <td align="center">{{$dataa->matkul->kode}}</td>
                    <td>{{$dataa->matkul->nama_matakuliah}}</td>
                    <td align="center">{{$dataa->matkul->sks}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <thead>
                    <td align="right">Total</td>
                    @if (Auth::user()->role == "mahasiswa")
                    <td width="60px" align="center"> <b>{{ $datas }}</b></td>
                    @endif
            </thead>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>