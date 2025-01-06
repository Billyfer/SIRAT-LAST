@extends('layouts.app')

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
            <input type="text" name="nama_jamaah" class="form-control" id="nama_jamaah" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telpon" class="form-label">No. Telepon</label>
            <input type="text" name="no_telpon" class="form-control" id="no_telpon" required>
        </div>
        <div class="mb-3">
            <label for="id_paket" class="form-label">Paket</label>
            <select name="id_paket" class="form-control" id="id_paket" required>
                @foreach($pakets as $paket)
                    @if($paket->total_seat - $paket->jamaahs->count() > 0)
                        <option value="{{ $paket->id }}">{{ $paket->nama_paket }} (Sisa: {{ $paket->total_seat - $paket->jamaahs->count() }})</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection