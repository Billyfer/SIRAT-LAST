{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container">
    <h1>Edit Fasilitas</h1>
    <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_paket" class="form-label">Pilih Paket</label>
            <select name="id_paket" id="id_paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                @foreach($pakets as $paket)
                <option value="{{ $paket->id }}" {{ $paket->id == $fasilitas->id_paket ? 'selected' : '' }}>
                    {{ $paket->nama_paket }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="peralatan" class="form-label">Peralatan</label>
            <input type="text" name="peralatan" class="form-control" value="{{ $fasilitas->peralatan }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $fasilitas->keterangan }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection