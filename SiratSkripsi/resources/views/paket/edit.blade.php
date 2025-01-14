{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container">
    <h2>Edit Data Paket</h2>
    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                value="{{ $paket->tanggal_keberangkatan }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_kepulangan">Tanggal Kepulangan</label>
            <input type="date" class="form-control" id="tanggal_kepulangan" name="tanggal_kepulangan"
                value="{{ $paket->tanggal_kepulangan }}" required>
        </div>
        <div class="form-group">
            <label for="nama_paket">Nama Paket</label>
            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}"
                required>
        </div>
        <div class="form-group">
            <label for="hotel_madinah">Hotel Madinah</label>
            <input type="text" class="form-control" id="hotel_madinah" name="hotel_madinah"
                value="{{ $paket->hotel_madinah }}" required>
        </div>
        <div class="form-group">
            <label for="hotel_mekkah">Hotel Mekkah</label>
            <input type="text" class="form-control" id="hotel_mekkah" name="hotel_mekkah"
                value="{{ $paket->hotel_mekkah }}" required>
        </div>
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" class="form-control" id="program" name="program" value="{{ $paket->program }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $paket->harga }}" required>
        </div>
        <div class="form-group">
            <label for="pesawat">Pesawat</label>
            <input type="text" class="form-control" id="pesawat" name="pesawat" value="{{ $paket->pesawat }}" required>
        </div>
        <div class="form-group">
            <label for="total_seat">Total Seat</label>
            <input type="number" class="form-control" id="total_seat" name="total_seat" value="{{ $paket->total_seat }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection