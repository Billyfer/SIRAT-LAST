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
            <a href="{{ route('paket.create') }}" class="btn btn-success">Create New Paket</a>
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
                @forelse($data_paket as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tanggal_keberangkatan }}</td>
                    <td>{{ $item->tanggal_kepulangan }}</td>
                    <td>{{ $item->paket }}</td>
                    <td>{{ $item->hotel_madinah }}</td>
                    <td>{{ $item->hotel_mekkah }}</td>
                    <td>{{ $item->program }}</td>
                    <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->pesawat }}</td>
                    <td>{{ $item->total_seat }}</td>
                    <td>{{ $item->terisi }}</td>
                    <td>{{ $item->sisa }}</td>
                    <td>
                        <a href="{{ route('paket.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('paket.destroy', $item->id) }}" method="POST" class="d-inline">
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