@extends('layout')

@section('title')
Entry Barang
@endsection

@section('content')
<div class="section">
    <div class="section-header">
        <h5>barang #{{ $barang->{'2122091_KdBarang'} }}</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->{'2122091_KdBarang'}) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="id">ID Barang</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $barang->{'2122091_KdBarang'} }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $barang->{'2122091_NmBarang'} }}">
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan Barang</label>
                    <input type="text" name="satuan" id="satuan" class="form-control" value="{{ $barang->{'2122091_Satuan'} }}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="text" name="stok" id="stok" class="form-control" value="{{ $barang->{'2122091_Stok'} }}">
                </div>
                <div class="form-group">
                    <label for="harga">Harga Barang</label>
                    <input type="number" name="harga" id="harga" class="form-control" value="{{ $barang->{'2122091_HrgBarang'} }}">
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </form>
        </div>
    </div>
</div>
@stop
