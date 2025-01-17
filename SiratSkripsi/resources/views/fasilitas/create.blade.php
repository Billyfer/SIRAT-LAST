{{-- @extends('layouts.app') --}}

@extends('master.master')
@section('content')
<div class="container">
    <h1>Tambah Peralatan</h1>
    <form action="{{ route('fasilitas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_paket" class="form-label">Pilih Paket</label>
            <select name="id_paket" id="id_paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                @foreach($pakets as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                @endforeach
            </select>
        </div>

        <div id="peralatan-container">
            <div class="mb-3">
                <label for="peralatan[]" class="form-label">Peralatan</label>
                <input type="text" name="peralatan[]" class="form-control" required>

                <label for="keterangan[]" class="form-label">Keterangan</label>
                <input type="text" name="keterangan[]" class="form-control">
            </div>
        </div>

        <button type="button" id="add-peralatan" class="btn btn-secondary mb-3">Tambah Input</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script>
    document.getElementById('add-peralatan').addEventListener('click', function() {
        const container = document.getElementById('peralatan-container');
        const newField = `
            <div class="mb-3">
                <label for="peralatan[]" class="form-label">Peralatan</label>
                <input type="text" name="peralatan[]" class="form-control" required>
                
                <label for="keterangan[]" class="form-label">Keterangan</label>
                <input type="text" name="keterangan[]" class="form-control">
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newField);
    });
</script>
@endsection
