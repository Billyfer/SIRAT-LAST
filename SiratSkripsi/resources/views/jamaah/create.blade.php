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
            <input type="text" name="nama_jamaah" class="form-control" id="nama_jamaah" value="{{ old('nama_jamaah') }}" required>
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
                <option value="{{ $paket->id }}" {{ old('id_paket')==$paket->id ? 'selected' : '' }}>
                    {{ $paket->nama_paket }} (Sisa: {{ $paket->total_seat - $paket->jamaahs->count() }})
                </option>
                @endforeach
            </select>
            @error('id_paket')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="id_karyawan" class="form-label">Karyawan (Referal)</label>
            <select name="id_karyawan" class="form-control" id="id_karyawan">
                <option value="" disabled selected>Pilih Karyawan</option>
                @foreach($karyawans as $karyawan)
                <option value="{{ $karyawan->id }}" data-referal="{{ $karyawan->username }}" {{ old('id_karyawan')==$karyawan->id ? 'selected' : '' }}>
                    {{ $karyawan->nama }}
                </option>
                @endforeach
            </select>
            @error('id_karyawan')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code_referals" class="form-label">Nama Karyawan</label>
            <input type="text" name="code_referals" class="form-control" id="code_referals" value="{{ old('code_referals') }}" readonly>
            @error('code_referals')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- File Uploads -->
        <div class="mb-3">
            <label for="kartu_keluarga" class="form-label">Kartu Keluarga</label>
            <input type="file" name="kartu_keluarga" class="form-control" id="kartu_keluarga" accept="image/*,.pdf">
        </div>
        <div class="mb-3">
            <label for="ktp" class="form-label">KTP</label>
            <input type="file" name="ktp" class="form-control" id="ktp" accept="image/*,.pdf">
        </div>
        <div class="mb-3">
            <label for="surat_kesehatan" class="form-label">Surat Kesehatan</label>
            <input type="file" name="surat_kesehatan" class="form-control" id="surat_kesehatan" accept="image/*,.pdf">
        </div>
        <div class="mb-3">
            <label for="visa" class="form-label">Visa</label>
            <input type="file" name="visa" class="form-control" id="visa" accept="image/*,.pdf">
        </div>
        <div class="mb-3">
            <label for="surat_pendukung" class="form-label">Surat Pendukung</label>
            <input type="file" name="surat_pendukung" class="form-control" id="surat_pendukung" accept="image/*,.pdf">
        </div>
        <!-- Additional fields remain unchanged -->
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script>
    document.getElementById('id_karyawan').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const referalCode = selectedOption.getAttribute('data-referal');
        document.getElementById('code_referals').value = referalCode ? referalCode : '';
    });
</script>
@endsection
