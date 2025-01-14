{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Data Perusahaan</h2>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('perusahaan.update', $data_perusahaan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_cabang" class="form-label">Nama Cabang</label>
            <input type="text" name="nama_cabang" class="form-control"
                value="{{ old('nama_cabang', $data_perusahaan->nama_cabang) }}" required>
        </div>
        <div class="mb-3">
            <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
            <input type="text" name="kota_kabupaten" class="form-control"
                value="{{ old('kota_kabupaten', $data_perusahaan->kota_kabupaten) }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $data_perusahaan->alamat) }}"
                required>
        </div>
        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan</label>
            <input type="text" name="nama_pimpinan" class="form-control"
                value="{{ old('nama_pimpinan', $data_perusahaan->nama_pimpinan) }}" required>
        </div>
        <div class="mb-3">
            <label for="nib_cabang" class="form-label">NIB Cabang</label>
            <input type="text" name="nib_cabang" class="form-control"
                value="{{ old('nib_cabang', $data_perusahaan->nib_cabang) }}" required>
        </div>
        <div class="mb-3">
            <label for="pdf_nib" class="form-label">PDF NIB (Upload jika ingin mengganti)</label>
            <input type="file" name="pdf_nib" class="form-control">
            @if ($data_perusahaan->pdf_nib)
            <p class="mt-2">
                <a href="{{ asset('storage/' . $data_perusahaan->pdf_nib) }}" target="_blank">Lihat PDF NIB saat ini</a>
            </p>
            @endif
        </div>
        <div class="mb-3">
            <label for="pdf_akta_cabang" class="form-label">PDF Akta Cabang (Upload jika ingin mengganti)</label>
            <input type="file" name="pdf_akta_cabang" class="form-control">
            @if ($data_perusahaan->pdf_akta_cabang)
            <p class="mt-2">
                <a href="{{ asset('storage/' . $data_perusahaan->pdf_akta_cabang) }}" target="_blank">Lihat PDF Akta
                    Cabang saat ini</a>
            </p>
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection