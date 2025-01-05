@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Paket</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('jamaah.create') }}" class="btn btn-success">Create New Data Paket</a>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Tanggal Kepulangan</th>
                    <th>Paket</th>
                    <th>Hotel Madinah</th>
                    <th>Hotel Mekkah</th>
                    <th>Program</th>
                    <th>Harga</th>
                    <th>Pesawat</th>
                    <th>Total Seat</th>
                    <th>Terisi</th>
                    <th>Sisa</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_jamaahs as $data_jamaah)
                    <tr>
                        <td>{{ $data_jamaah->id }}</td>
                        <td>{{ $data_jamaah->tanggal_keberangkatan }}</td>
                        <td>{{ $data_jamaah->tanggal_kepulangan }}</td>
                        <td>{{ $data_jamaah->paket }}</td>
                        <td>{{ $data_jamaah->hotel_madinah }}</td>
                        <td>{{ $data_jamaah->hotel_mekkah }}</td>
                        <td>{{ $data_jamaah->program }}</td>
                        <td>{{ number_format($data_jamaah->harga, 0, ',', '.') }}</td>
                        <td>{{ $data_jamaah->pesawat }}</td>
                        <td>{{ $data_jamaah->total_seat }}</td>
                        <td>{{ $data_jamaah->terisi }}</td>
                        <td>{{ $data_jamaah->sisa }}</td>
                        <td>
                            <a href="{{ route('jamaah.edit', $data_jamaah->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('jamaah.destroy', $data_jamaah->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
