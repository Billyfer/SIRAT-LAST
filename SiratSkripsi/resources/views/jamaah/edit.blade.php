@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Jamaah</h2>
        </div>
    </div>
    <form action="{{ route('jamaah.update', $jamaah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_jamaah" class="form-label">Nama Jamaah</label>
            <input type="text" name="nama_jamaah" class="form-control" id="nama_jamaah" value="{{ $jamaah->nama_jamaah }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" required>{{ $jamaah->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_telpon" class="form-label">No. Telepon</label>
            <input type="text" name="no_telpon" class="form-control" id="no_telpon" value="{{ $jamaah->no_telpon }}" required>
        </div>
        <div class="mb-3">
            <label for="id_paket" class="form-label">Paket</label>
            <select name="id_paket" class="form-control" id="id_paket" required>
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}" {{ $jamaah->id_paket == $paket->id ? 'selected' : '' }}>
                        {{ $paket->nama_paket }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_perusahaan" class="form-label">Perusahaan</label>
            <select name="id_perusahaan" class="form-control" id="id_perusahaan" required>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}" {{ $jamaah->id_perusahaan == $perusahaan->id ? 'selected' : '' }}>
                        {{ $perusahaan->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
            <input type="file" name="kartu_keluarga" class="form-control" id="kartu_keluarga" accept="image/*,.pdf">
            @if($jamaah->kartu_keluarga)
                <p><a href="{{ asset('storage/' . $jamaah->kartu_keluarga) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">KTP</label>
            <input type="file" name="ktp" class="form-control" id="ktp" accept="image/*,.pdf">
            @if($jamaah->ktp)
                <p><a href="{{ asset('storage/' . $jamaah->ktp) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="surat_kesehatan" class="form-label">Surat Kesehatan</label>
            <input type="file" name="surat_kesehatan" class="form-control" id="surat_kesehatan" accept="image/*,.pdf">
            @if($jamaah->surat_kesehatan)
                <p><a href="{{ asset('storage/' . $jamaah->surat_kesehatan) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="visa" class="form-label">Visa</label>
            <input type="file" name="visa" class="form-control" id="visa" accept="image/*,.pdf">
            @if($jamaah->visa)
                <p><a href="{{ asset('storage/' . $jamaah->visa) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
        <div class="mb-3">
            <label for="surat_pendukung" class="form-label">Surat Pendukung</label>
            <input type="file" name="surat_pendukung" class="form-control" id="surat_pendukung" accept="image/*,.pdf">
            @if($jamaah->surat_pendukung)
                <p><a href="{{ asset('storage/' . $jamaah->surat_pendukung) }}" target="_blank">Lihat File</a></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
