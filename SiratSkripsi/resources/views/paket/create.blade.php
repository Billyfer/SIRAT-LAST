@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Create Data Paket</h2>
            <form action="{{ route('paket.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Tanggal_Keberangkatan" class="form-label">Tanggal Keberangkatan</label>
                    <input type="date" class="form-control" id="tanggal_keberangkatan" name="tanggal_keberangkatan"
                        required>
                </div>
                <div class="mb-3">
                    <label for="Tanggal_Kepulangan" class="form-label">Tanggal Kepulangan</label>
                    <input type="date" class="form-control" id="tanggal_kepulangan" name="tanggal_kepulangan" required>
                </div>
                <div class="mb-3">
                    <label for="Paket" class="form-label">Paket</label>
                    <input type="text" class="form-control" id="paket" name="paket" required>
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
                    <label for="terisi" class="form-label">Terisi</label>
                    <input type="number" class="form-control" id="terisi" name="terisi" required>
                </div>
                <div class="mb-3">
                    <label for="sisa" class="form-label">Sisa</label>
                    <input type="number" class="form-control" id="sisa" name="sisa" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection