{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Create Jamaah</h2>
        </div>
    </div>
    <form action="{{ route('jamaah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_jamaah" class="form-label">Nama Jamaah</label>
            <input type="text" name="nama_jamaah" class="form-control" id="nama_jamaah" value="{{ old('nama_jamaah') }}"
                required>
            @error('nama_jamaah')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" required>{{ old('alamat') }}</textarea>
            @error('alamat')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_paket" class="form-label">Paket</label>
            <select name="id_paket" class="form-control" id="id_paket" required>
                <option value="" disabled selected>Pilih Paket</option>
                @foreach($pakets as $paket)
                @if($paket->total_seat - $paket->jamaahs->count() > 0)
                <option value="{{ $paket->id }}" {{ old('id_paket')==$paket->id ? 'selected' : '' }}>
                    {{ $paket->nama_paket }} (Sisa: {{ $paket->total_seat - $paket->jamaahs->count() }})
                </option>
                @endif
                @endforeach
            </select>
            @error('id_paket')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_perusahaan" class="form-label">Perusahaan</label>
            <select name="id_perusahaan" class="form-control" id="id_perusahaan" required>
                <option value="" disabled selected>Pilih Perusahaan</option>
                @foreach($perusahaans as $perusahaan)
                <option value="{{ $perusahaan->id }}" {{ old('id_perusahaan')==$perusahaan->id ? 'selected' : '' }}>
                    {{ $perusahaan->nama_perusahaan }}
                </option>
                @endforeach
            </select>
            @error('id_perusahaan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_karyawan" class="form-label">Karyawan (Optional)</label>
            <select name="id_karyawan" class="form-control" id="id_karyawan">
                <option value="" disabled selected>Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}" {{ old('id_karyawan')==$karyawan->id ? 'selected' : '' }}>
                    {{ $karyawan->nama }}
                </option>
                @endforeach
            </select>
            @error('id_karyawan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code_referals" class="form-label">Kode Referal</label>
            <input type="text" name="code_referals" class="form-control" id="code_referals"
                value="{{ old('code_referals') }}" required>
            @error('code_referals')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- File uploads -->
        <div class="mb-3">
            <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
            <input type="file" name="kartu_keluarga" class="form-control" id="kartu_keluarga" accept="image/*,.pdf">
        </div>
        <!-- Additional fields remain unchanged -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection