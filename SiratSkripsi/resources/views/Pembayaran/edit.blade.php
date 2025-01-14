{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Edit Pembayaran</h2>
        </div>
    </div>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_data_jamaahs" class="form-label">Nama Jamaah</label>
            <select name="id_data_jamaahs" id="id_data_jamaahs" class="form-control" required>
                @foreach($jamaahs as $jamaah)
                <option value="{{ $jamaah->id }}" {{ $pembayaran->id_data_jamaahs == $jamaah->id ? 'selected' : '' }}>
                    {{ $jamaah->nama_jamaah }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control"
                value="{{ $pembayaran->tanggal_pembayaran }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
            <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control"
                value="{{ $pembayaran->jumlah_pembayaran }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"
                required>{{ $pembayaran->keterangan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="penerima" class="form-label">Penerima</label>
            <input type="text" name="penerima" id="penerima" class="form-control" value="{{ $pembayaran->penerima }}"
                required>
        </div>
        <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
            @if($pembayaran->bukti_pembayaran)
            <small><a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">Lihat Bukti
                    Pembayaran</a></small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection