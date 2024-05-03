@extends('layout')

@section('title')
Menu Utama
@endsection

@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Menu Utama</h5>
        </div>
        <h5 class="section-title">Statistik Selama Ini</h5>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            {{ $pelanggan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Barang</h4>
                        </div>
                        <div class="card-body">
                            {{ $barang }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Transaksi</h4>
                        </div>
                        <div class="card-body">
                            {{ $transaksi }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-print"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Nota dicetak</h4>
                        </div>
                        <div class="card-body">
                            {{ $nota }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">Barang dengan stok sedikit</div>
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <th>KD Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                            </thead>
                            <tbody>
                                @forelse ($stoksedikit as $barang)
                                    <td>{{ $barang->{'2122091_KdBarang'} }}</td>
                                    <td>{{ $barang->{'2122091_NmBarang'} }}</td>
                                    @if ($barang->{'2122091_Stok'} > 5)
                                        <td><span class="badge badge-warning">{{ $barang->{'2122091_Stok'} }}</span></td>
                                    @endif
                                    @if ($barang->{'2122091_Stok'} < 5)
                                        <td><span class="badge badge-danger">{{ $barang->{'2122091_Stok'} }}</span></td>
                                    @endif
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
