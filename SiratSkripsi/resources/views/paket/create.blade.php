{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Create Data Paket</h2>
            <form action="{{ route('paket.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_paket" class="form-label">Nama Paket</label>
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                        required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kepulangan" class="form-label">Tanggal Kepulangan</label>
                    <input type="date" class="form-control" id="tanggal_kepulangan" name="tanggal_kepulangan" required>
                </div>
                <div class="mb-3">
                    <label for="hotel_madinah" class="form-label">Hotel Madinah</label>
                    <input type="text" class="form-control" id="hotel_madinah" name="hotel_madinah" required>
                </div>
                <div class="mb-3">
                    <label for="hotel_mekkah" class="form-label">Hotel Mekkah</label>
                    <input type="text" class="form-control" id="hotel_mekkah" name="hotel_mekkah" required>
                </div>
                <div class="mb-3">
                    <label for="program" class="form-label">Program</label>
                    <input type="text" class="form-control" id="program" name="program" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="pesawat" class="form-label">Pesawat</label>
                    <input type="text" class="form-control" id="pesawat" name="pesawat" required>
                </div>
                <div class="mb-3">
                    <label for="total_seat" class="form-label">Total Seat</label>
                    <input type="number" class="form-control" id="total_seat" name="total_seat" required>
                </div>

                <div class="mb-3">
                    <label for="total_seat" class="form-label">Jenis Paket</label>
                    <input type="number" class="form-control" id="jenis_paket" name="jenis_paket" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection