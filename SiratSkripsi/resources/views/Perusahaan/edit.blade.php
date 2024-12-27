@extends('layouts.app')

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
            <input type="text" name="nama_cabang" class="form-control" value="{{ $data_perusahaan->nama_cabang }}" required>
        </div>
        <div class="mb-3">
            <label for="kota_kabupaten" class="form-label">Kota/Kabupaten</label>
            <input type="text" name="kota_kabupaten" class="form-control" value="{{ $data_perusahaan->kota_kabupaten }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $data_perusahaan->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan</label>
            <input type="text" name="nama_pimpinan" class="form-control" value="{{ $data_perusahaan->nama_pimpinan }}" required>
        </div>
        <div class="mb-3">
            <label for="nib_cabang" class="form-label">NIB Cabang</label>
            <input type="text" name="nib_cabang" class="form-control" value="{{ $data_perusahaan->nib_cabang }}" required>
        </div>
        <div class="mb-3">
            <label for="pdf_nib" class="form-label">PDF NIB</label>
            <input type="file" name="pdf_nib" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pdf_akta_cabang" class="form-label">PDF Akta Cabang</label>
            <input type="file" name="pdf_akta_cabang" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
