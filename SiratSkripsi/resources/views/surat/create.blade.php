{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Tambah Surat</h2>
        </div>
    </div>
    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_data_perusahaans" class="form-label">Perusahaan</label>
            <select name="id_data_perusahaans" id="id_data_perusahaans" class="form-select">
                <option value="">Pilih Perusahaan</option>
                @foreach($perusahaans as $perusahaan)
                <option value="{{ $perusahaan->id }}">{{ $perusahaan->nama_perusahaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_karyawans" class="form-label">Karyawan</label>
            <select name="id_karyawans" id="id_karyawans" class="form-select">
                <option value="">Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}">{{ $karyawan->nama_karyawan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="dokumen_surat" class="form-label">Dokumen Surat</label>
            <input type="file" name="dokumen_surat" id="dokumen_surat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control" rows="2"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection