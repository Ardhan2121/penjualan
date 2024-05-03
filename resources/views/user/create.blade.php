@extends('layout')

@section('title')
Add User
@endsection

@section('content')
<div class="section">
    <div class="section-header">
        <h5>Tambah User</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" username="id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-right">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection
