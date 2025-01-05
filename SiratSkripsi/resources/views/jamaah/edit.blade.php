@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Paket</h2>
    <form action="{{ route('paket.update', $data_paket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Tanggal_Keberangkatan">Tanggal Keberangkatan</label>
            <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                value="{{ $data_paket->tanggal_keberangkatan }}" required>
        </div>
        <div class="form-group">
            <label for="Tanggal_Kepulangan">Tanggal Kepulangan</label>
            <input type="date" class="form-control" id="tanggal_kepulangan" name="tanggal_kepulangan"
                value="{{ $data_paket->tanggal_kepulangan }}" required>
        </div>
        <div class="form-group">
            <label for="Paket">Paket</label>
            <input type="text" class="form-control" id="paket" name="paket" value="{{ $data_paket->paket }}" required>
        </div>
        <div class="form-group">
            <label for="hotel_madinah">Hotel Madinah</label>
            <input type="text" class="form-control" id="hotel_madinah" name="hotel_madinah"
                value="{{ $data_paket->hotel_madinah }}" required>
        </div>
        <div class="form-group">
            <label for="hotel_mekkah">Hotel Mekkah</label>
            <input type="text" class="form-control" id="hotel_mekkah" name="hotel_mekkah"
                value="{{ $data_paket->hotel_mekkah }}" required>
        </div>
        <div class="form-group">
            <label for="program">Program</label>
            <input type="text" class="form-control" id="program" name="program" value="{{ $data_paket->program }}"
                required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $data_paket->harga }}" required>
        </div>
        <div class="form-group">
            <label for="pesawat">Pesawat</label>
            <input type="text" class="form-control" id="pesawat" name="pesawat" value="{{ $data_paket->pesawat }}"
                required>
        </div>
        <div class="form-group">
            <label for="total_seat">Total Seat</label>
            <input type="number" class="form-control" id="total_seat" name="total_seat"
                value="{{ $data_paket->total_seat }}" required>
        </div>
        <div class="form-group">
            <label for="terisi">Terisi</label>
            <input type="number" class="form-control" id="terisi" name="terisi" value="{{ $data_paket->terisi }}"
                required>
        </div>
        <div class="form-group">
            <label for="sisa">Sisa</label>
            <input type="number" class="form-control" id="sisa" name="sisa" value="{{ $data_paket->sisa }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection