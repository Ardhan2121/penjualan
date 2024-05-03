<!DOCTYPE html>
<html>

<head>
    <title>Koperasi SMK Media Informatika</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        * {
            font-family: "sans-serif";
        }

        p {
            margin-bottom: 1px;
        }

        table#data-pesanan tr td {
            padding: 7px;
        }

        table#data-pesanan tr td:nth-child(1) {
            width: 14%;
            white-space: nowrap
        }

        table#data-pesanan tr td:nth-child(3) {
            width: 70%
        }

        table#data-pesanan tr td:nth-child(4) {
            width: 14%;
            white-space: nowrap
        }

        table#data-pesanan tr td:nth-child(6) {
            width: 14%;
            white-space: nowrap
        }

        table#data-pesanan tr td:nth-child(2),
        table#data-pesanan tr td:nth-child(5) {
            width: 1%;
        }


        hr {
            border: 2px double black;
        }
    </style>
</head>

<body>
    <div class="">
        <table class="mx-auto mb-3">
            <tr>
                <td><img src="https://4.bp.blogspot.com/--xZtXtjs570/UfCur3M2CEI/AAAAAAAABrM/87SLeyAPVsk/s1600/metik-tranparan.png" alt="" width="150" class="mr-4"></td>
                <td class="text-center">
                    <h1>Laporan Penjualan</h1>
                    <p>Jl. Damai, Kekembangan Dalam, No.39, Kekembangan Selatan, Petamburan, Jakarta 12270</p>
                    <p>Telepon/Fax: (021) 2270 0846 | Website: www.smkmediainformatika.sch.id</p>
                </td>
            </tr>
        </table>
        <hr>
        <h3 class="text-center mb-3">Periode {{ $start }} <span>s/d</span> {{ $to }}</h3>
        <table class="table mx-auto table-bordered text-center">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No Nota</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Barang</th>
                    <th>QTY</th>
                    <th>Harga Barang</th>
                    <th>Harga Jual</th>
                    <th>Jumlah Laba</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalJual = 0;
                    $totalLaba = 0;
                @endphp
                @foreach ($notas as $nota)
                    @foreach ($nota->sp->barangs()->get() as $barang)
                        <tr>
                            <td>{{ $nota->{'2122091_TglNota'} }}</td>
                            <td>{{ $nota->{'2122091_NoNota'} }}</td>
                            <td>{{ $nota->sp->pelanggan->{'2122091_NmPelanggan'} }}</td>
                            <td>{{ $barang->{'2122091_NmBarang'} }}</td>
                            <td>{{ $barang->pivot->{'2122091_JmlJual'} }}</td>
                            <td>@rupiah($barang->{'2122091_HrgBarang'})</td>
                            <td>@rupiah($barang->pivot->{'2122091_HrgJual'})</td>
                            <td class="text-success">+@rupiah($barang->pivot->{'2122091_HrgJual'} - $barang->{'2122091_HrgBarang'})</td>
                        </tr>
                        @php
                            $totalJual += $barang->pivot->{'2122091_HrgJual'};
                            $totalLaba += $barang->pivot->{'2122091_HrgJual'} - $barang->{'2122091_HrgBarang'};
                        @endphp
                    @endforeach
                @endforeach
            </tbody>
            <tr>
                <td colspan="5"></td>
                <td>Total</td>
                <td>@rupiah($totalJual)</td>
                <td class="text-success">+@rupiah($totalLaba)</td>
            </tr>
        </table>
    </div>
</body>

</html>
