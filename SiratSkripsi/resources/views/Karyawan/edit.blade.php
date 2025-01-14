{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Data Karyawan</h2>
        </div>
    </div>
    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $karyawan->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select" required>
                <option value="Karyawan Pusat" {{ $karyawan->role == 'Karyawan Pusat' ? 'selected' : '' }}>Karyawan
                    Pusat</option>
                <option value="Pimpinan Cabang" {{ $karyawan->role == 'Pimpinan Cabang' ? 'selected' : '' }}>Pimpinan
                    Cabang</option>
                <option value="Karyawan Cabang" {{ $karyawan->role == 'Karyawan Cabang' ? 'selected' : '' }}>Karyawan
                    Cabang</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="cabang_id" class="form-label">Cabang</label>
            <input type="number" name="cabang_id" class="form-control" id="cabang_id"
                value="{{ $karyawan->cabang_id }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $karyawan->email }}" required>
        </div>
        <div class="mb-3">
            <label for="no_wa" class="form-label">No. WA</label>
            <input type="text" name="no_wa" class="form-control" id="no_wa" value="{{ $karyawan->no_wa }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ $karyawan->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username" value="{{ $karyawan->username }}"
                required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection