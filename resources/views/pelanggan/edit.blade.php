@extends('layout')

@section('title')
Entry Pelanggan
@endsection

@section('content')
<div class="section">
    <div class="section-header">
        <h5>Pelanggan #{{ $pelanggan->{'2122091_IdPelanggan'} }}</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->{'2122091_IdPelanggan'}) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="id">ID Pelanggan</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $pelanggan->{'2122091_IdPelanggan'} }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $pelanggan->{'2122091_NmPelanggan'} }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat Pelanggan</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pelanggan->{'2122091_Alamat'} }}">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon Pelanggan</label>
                    <input type="text" name="telepon" id="telepon" class="form-control" value="{{ $pelanggan->{'2122091_NoTelp'} }}">
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>
@stop
