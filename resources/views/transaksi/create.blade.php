@extends('layout')

@section('title')
Buat Surat Pesan
@endsection

@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Buat Transaksi</h5>
        </div>
        <form action="{{ route('transaksi.store') }}" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Pesanan
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="nopesan">No Pesanan</label>
                                            <input type="text" name="nopesan" id="nopesan" class="form-control" value="{{ $id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalpesan">Tgl Pesanan</label>
                                            <input type="date" name="tanggalpesan" id="tanggalpesan" class="form-control" readonly value="{{ date('Y-m-d') }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Barang
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('transaksi.setBarang') }}" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="kdbarang">Kode Barang</label>
                                                <select name="kdbarang" id="kdbarang" class="form-control">
                                                    <option selected disabled>-</option>
                                                    @foreach ($barangs as $barang)
                                                        <option value="{{ $barang->{'2122091_KdBarang'} }}">{{ $barang->{'2122091_KdBarang'} }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @csrf
                                            <div class="form-group col-lg-6">
                                                <label for="namabarang">Nama Barang</label>
                                                <input type="text" name="namabarang" id="namabarang" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="hargabarang">Harga Barang</label>
                                                <input type="number" name="hargabarang" id="hargabarang" class="form-control" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="hargajual">Harga Jual</label>
                                                <input type="text" name="hargajual" id="hargajual" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="qty">QTY</label>
                                                <input type="number" name="qty" id="qty" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right" id="tambahbarang">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Pelanggan
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="idpelanggan">Id Pelanggan</label>
                                            <select name="idpelanggan" id="idpelanggan" class="form-control">
                                                <option value="" disabled selected>-</option>
                                                @foreach ($pelanggans as $pelanggan)
                                                    <option value="{{ $pelanggan->{'2122091_IdPelanggan'} }}" {{ session()->has('pelanggan') && session('pelanggan') == $pelanggan->{'2122091_IdPelanggan'} ? 'selected' : '' }}>
                                                        {{ $pelanggan->{'2122091_IdPelanggan'} }} - {{ $pelanggan->{'2122091_NmPelanggan'} }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="namapelanggan">Nama Pelanggan</label>
                                            <input type="text" name="namapelanggan" id="namapelanggan" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="alamatpelanggan">Alamat</label>
                                            <input type="text" name="alamatpelanggan" id="alamatpelanggan" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="teleponpelanggan">Telepon</label>
                                            <input type="text" name="teleponpelanggan" id="teleponpelanggan" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 overflow-hidden">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-end mb-3">
                                        <button type="submit" class="btn btn-primary mx-1">Buat Transaksi</button>
                                        <a href="{{ route('transaksi.reset') }}" class="btn btn-danger">Reset</a>
                                    </div>
                                    <table class="table table-bordered datatable">
                                        <thead>
                                            <th>KD Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>QTY</th>
                                            <th>Harga Jual</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody id="table-body">
                                            @php
                                                $totalKeseluruhan = 0;
                                            @endphp
                                            @forelse (Session::get('pesanan.cart', []) as $pesanan)
                                                <tr>
                                                    <td>{{ $pesanan['kd'] }}</td>
                                                    <td>{{ $pesanan['nama'] }}</td>
                                                    <td>{{ $pesanan['stok'] }}</td>
                                                    <td>{{ $pesanan['qty'] }}</td>
                                                    <td>@rupiah($pesanan['harga'])</td>
                                                    <td>@rupiah($pesanan['total'])</td>
                                                    <td><a class="btn btn-danger" href="{{ route('transaksi.hapusBarang', ['id' => $loop->index]) }}">Hapus</a></td>
                                                </tr>
                                                @php
                                                    $totalKeseluruhan += $pesanan['total']; // Menambahkan total produk ke total keseluruhan
                                                @endphp
                                            @empty
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr class="bg-light">
                                                <td colspan="5">Total</td>
                                                <td colspan="2">@rupiah($totalKeseluruhan)</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            getPelanggan();

            $('#idpelanggan').change(function() {
                getPelanggan();
            });
            $('#kdbarang').change(function() {
                getBarang();
            });
        });
    </script>

    <script>
        function getPelanggan() {
            var idPelanggan = $('#idpelanggan').val();
            var url = 'transaksi/pelanggan/cari/' + idPelanggan
            if (idPelanggan !== null) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response)
                        $('#namapelanggan').val(response['2122091_NmPelanggan']);
                        $('#alamatpelanggan').val(response['2122091_Alamat']);
                        $('#teleponpelanggan').val(response['2122091_NoTelp']);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        function getBarang() {
            var kdBarang = $('#kdbarang').val();
            var url = 'transaksi/barang/cari/' + kdBarang
            if (kdBarang !== null) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function(response) {
                        $('#namabarang').val(response['2122091_NmBarang']);
                        $('#hargabarang').val(response['2122091_HrgBarang']);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endpush
