{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Surat</h2>
        </div>
    </div>
    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_data_perusahaans" class="form-label">Perusahaan</label>
            <select name="id_data_perusahaans" id="id_data_perusahaans" class="form-select">
                <option value="">Pilih Perusahaan</option>
                @foreach($perusahaans as $perusahaan)
                <option value="{{ $perusahaan->id }}" {{ $surat->id_data_perusahaans == $perusahaan->id ? 'selected' :
                    '' }}>
                    {{ $perusahaan->nama_perusahaan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_karyawans" class="form-label">Karyawan</label>
            <select name="id_karyawans" id="id_karyawans" class="form-select">
                <option value="">Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}" {{ $surat->id_karyawans == $karyawan->id ? 'selected' : '' }}>
                    {{ $karyawan->nama_karyawan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"
                required>{{ $surat->keterangan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="dokumen_surat" class="form-label">Dokumen Surat</label>
            <input type="file" name="dokumen_surat" id="dokumen_surat" class="form-control">
            @if($surat->dokumen_surat)
            <small>Dokumen saat ini: <a href="{{ asset('storage/' . $surat->dokumen_surat) }}" target="_blank">Lihat
                    Dokumen</a></small>
            @endif
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control" rows="2">{{ $surat->note }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection