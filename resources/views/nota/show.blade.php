<!DOCTYPE html>
<html>

<head>
    <title>SMK Media Informatika</title>
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
                    <h1>SMK MEDIA INFORMATIKA</h1>
                    <p>Jl. Damai, Kekembangan Dalam, No.39, Kekembangan Selatan, Petamburan, Jakarta 12270</p>
                    <p>Telepon/Fax: (021) 2270 0846 | Website: www.smkmediainformatika.sch.id</p>
                </td>
            </tr>
        </table>
        <hr>
        <h3 class="text-center">Nota</h3>
        <table class="mb-5 w-100" id="data-pesanan">
            <tr>
                <td>Nomor Nota</td>
                <td>:</td>
                <td>{{ $nota->{'2122091_NoNota'} }}</td>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td>{{ $nota->sp->pelanggan->{'2122091_NmPelanggan'} }}</td>
            </tr>
            <tr>
                <td>Tanggal Nota</td>
                <td>:</td>
                <td>{{ $nota->{'2122091_TglNota'} }}</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $nota->sp->pelanggan->{'2122091_Alamat'} }}</td>
            </tr>
            <tr>
                <td>Jumlah Bayar</td>
                <td>:</td>
                <td>@rupiah($nota->{'2122091_JmlHarga'})</td>
                <td>Telepon</td>
                <td>:</td>
                <td>{{ $nota->sp->pelanggan->{'2122091_NoTelp'} }}</td>
            </tr>
        </table>


        <table class="table mx-auto table-bordered text-center">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Beli</th>
                    <th>Harga</th>
                    <th>Jumlah Harga</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->{'2122091_KdBarang'} }}</td>
                        <td>{{ $pesanan->{'2122091_NmBarang'} }}</td>
                        <td>{{ $pesanan->pivot->{'2122091_JmlJual'} }}</td>
                        <td>@rupiah($pesanan->pivot['2122091_HrgJual'])</td>
                        <td>@rupiah($pesanan->pivot['2122091_HrgJual'] * $pesanan->pivot->{'2122091_JmlJual'})</td>
                        @php
                            $total += $pesanan->pivot['2122091_HrgJual'] * $pesanan->pivot->{'2122091_JmlJual'}
                        @endphp
                    </tr>
                @endforeach
            </tbody>
            <tr>
                <td colspan="3"></td>
                <td>Total Pembelian</td>
                <td>@rupiah($total)</td>
            </tr>
        </table>
    </div>
</body>

</html>
