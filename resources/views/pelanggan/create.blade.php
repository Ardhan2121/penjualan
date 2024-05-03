@extends('layout')

@section('title')
Entry Pelanggan
@endsection

@section('content')
<div class="section">
    <div class="section-header">
        <h5>Tambah Pelanggan</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id">ID Pelanggan</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" name="telepon" id="telepon" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
