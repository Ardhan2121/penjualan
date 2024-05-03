@extends('layout')

@section('title')
Entry Barang
@endsection

@section('content')
<div class="section">
    <div class="section-header">
        <h5>Tambah Barang</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="id">ID Barang</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan Barang</label>
                    <input type="text" name="satuan" id="satuan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="text" name="stok" id="stok" class="form-control">
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="number" name="harga" id="harga" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
