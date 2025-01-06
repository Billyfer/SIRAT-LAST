@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Tambah Role</h2>
        </div>
    </div>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_data_perusahaan" class="form-label">Nama Perusahaan</label>
            <select name="id_data_perusahaan" id="id_data_perusahaan" class="form-control">
                <option value="">Pilih Perusahaan (Opsional)</option>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_role" class="form-label">Jenis Role</label>
            <select name="jenis_role" id="jenis_role" class="form-control" required>
                <option value="">Pilih Jenis Role</option>
                <option value="Karyawan Pusat">Karyawan Pusat</option>
                <option value="Kepala Cabang">Kepala Cabang</option>
                <option value="Karyawan Cabang">Karyawan Cabang</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
