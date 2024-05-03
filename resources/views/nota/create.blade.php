@extends('layout')

@section('title')
Cetak Nota
@endsection

@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Cetak Nota</h5>
        </div>
        <form action="{{ route('nota.store') }}" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Nota
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="nonota">No Nota</label>
                                            <input type="text" name="nonota" id="nonota" class="form-control" value="{{ $id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggalnota">Tgl Nota</label>
                                            <input type="date" name="tanggalnota" id="tanggalnota" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Pesanan
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nopesan">No Pesanan</label>
                                        <select name="nopesan" id="nopesan" class="form-control">
                                            <option disabled selected>-</option>
                                            @foreach ($sps as $sp)
                                                <option value="{{ $sp->{'2122091_NoSP'} }}">{{ $sp->{'2122091_NoSP'} }} - {{ $sp->pelanggan->{'2122091_NmPelanggan'} }} - {{ $sp->{'2122091_TglSP'} }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggalpesan">Tgl Pesanan</label>
                                        <input type="date" name="tanggalpesan" id="tanggalpesan" class="form-control" readonly>
                                    </div>
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
                                            <input type="text" name="idpelanggan" id="idpelanggan" readonly class="form-control">
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
                                        <button type="submit" class="btn btn-primary mx-1"><i class="fa fa-print" aria-hidden="true"></i> Cetak Nota</button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered w-100">
                                            <thead>
                                                <th>KD Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th>QTY</th>
                                                <th>Harga Jual</th>
                                                <th>Total</th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
            $('#nopesan').change(function() {
                getData()
            });
        });
    </script>
    <script>
        function getData() {
            var noPesan = $('#nopesan').val();
            var url = 'nota/transaksi/cari/' + noPesan
            if (noPesan !== null) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        $('#tanggalpesan').val(response.sp['2122091_TglSP']);
                        $('table tbody').html(response.pesanan);
                        $('#idpelanggan').val(response.pelanggan['2122091_IdPelanggan']);
                        $('#namapelanggan').val(response.pelanggan['2122091_NmPelanggan']);
                        $('#alamatpelanggan').val(response.pelanggan['2122091_Alamat']);
                        $('#teleponpelanggan').val(response.pelanggan['2122091_NoTelp']);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endpush
