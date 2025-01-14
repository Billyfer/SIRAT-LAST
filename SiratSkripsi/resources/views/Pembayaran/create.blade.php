{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Tambah Pembayaran</h2>
        </div>
    </div>
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_data_jamaahs" class="form-label">Nama Jamaah</label>
            <select name="id_data_jamaahs" id="id_data_jamaahs" class="form-control" required>
                @foreach($jamaahs as $jamaah)
                <option value="{{ $jamaah->id }}">{{ $jamaah->nama_jamaah }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
            <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="penerima" class="form-label">Penerima</label>
            <input type="text" name="penerima" id="penerima" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection