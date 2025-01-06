@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Role</h2>
        </div>
    </div>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_data_perusahaan" class="form-label">Nama Perusahaan</label>
            <select name="id_data_perusahaan" id="id_data_perusahaan" class="form-control">
                <option value="">Pilih Perusahaan (Opsional)</option>
                @foreach($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}" {{ $role->id_data_perusahaan == $perusahaan->id ? 'selected' : '' }}>
                        {{ $perusahaan->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_role" class="form-label">Jenis Role</label>
            <select name="jenis_role" id="jenis_role" class="form-control" required>
                <option value="Karyawan Pusat" {{ $role->jenis_role == 'Karyawan Pusat' ? 'selected' : '' }}>Karyawan Pusat</option>
                <option value="Kepala Cabang" {{ $role->jenis_role == 'Kepala Cabang' ? 'selected' : '' }}>Kepala Cabang</option>
                <option value="Karyawan Cabang" {{ $role->jenis_role == 'Karyawan Cabang' ? 'selected' : '' }}>Karyawan Cabang</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
