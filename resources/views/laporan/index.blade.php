@extends('layout')

@section('title')
Data Laporan
@endsection

@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Data Laporan</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('laporan.filter') }}" method="POST">
                    <div class="d-flex justify-content-end">
                        <div class="w-50 d-flex justify-content-end align-items-center mb-4">
                            <span>Periode</span>
                            <input type="date" name="start" class="form-control mx-2">
                            <span>s/d</span>
                            <input type="date" name="to" class="form-control mx-2">
                            <button type="submit" name="submit" value="filter" class="btn btn-primary mx-2">Filter</button>
                            <button type="submit" name="submit" value="print" class="btn btn-secondary">Print</button>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No Nota</th>
                            <th>Nama Pelanggan</th>
                            <th>Jumlah Pembelian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($notas as $nota)
                            <tr>
                                <td>{{ $nota->{'2122091_TglNota'} }}</td>
                                <td>{{ $nota->{'2122091_NoNota'} }}</td>
                                <td>{{ $nota->sp->pelanggan->{'2122091_NmPelanggan'} }}</td>
                                <td>@rupiah($nota->{'2122091_JmlHarga'})</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('nota.show', ['id' => $nota->{'2122091_NoNota'}]) }}"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                </td>
                            </tr>
                            @php
                                $total += $nota->{'2122091_JmlHarga'};
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td colspan="3">Total</td>
                        <td colspan="2">@rupiah($total)</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
