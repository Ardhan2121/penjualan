@extends('layout')
@section('title')
Entry Pelanggan
@endsection
@section('content')
    <div class="section">
        <div class="section-header">
            <h5>Data Pelanggan</h5>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3"><a href="{{ route('pelanggan.create') }}" class="btn btn-info">Tambah</a></div>
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $pelanggan)
                            <tr>
                                <td>{{ $pelanggan->{'2122091_IdPelanggan'} }}</td>
                                <td>{{ $pelanggan->{'2122091_NmPelanggan'} }}</td>
                                <td>{{ $pelanggan->{'2122091_Alamat'} }}</td>
                                <td>{{ $pelanggan->{'2122091_NoTelp'} }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-warning mx-1" href="{{ route('pelanggan.edit', $pelanggan->{'2122091_IdPelanggan'}) }}">Edit</a>
                                        <form method="POST" action="{{ route('pelanggan.destroy', $pelanggan->{'2122091_IdPelanggan'}) }}">
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
