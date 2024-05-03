@extends('layout')

@section('title')
Entry Barang
@endsection

@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Data Barang</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3"><a href="{{ route('barang.create') }}" class="btn btn-info">Tambah</a></div>

                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>KD Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga Barang<sub>/satuan</sub></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ $barang->{'2122091_KdBarang'} }}</td>
                                <td>{{ $barang->{'2122091_NmBarang'} }}</td>
                                <td>{{ $barang->{'2122091_Stok'} }}</td>
                                <td>@rupiah($barang->{'2122091_HrgBarang'}) <sub>/{{ $barang->{'2122091_Satuan'} }}</sub></td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-warning mx-1" href="{{ route('barang.edit', $barang->{'2122091_KdBarang'}) }}">Edit</a>
                                        <form method="POST" action="{{ route('barang.destroy', $barang->{'2122091_KdBarang'}) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
