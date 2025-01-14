{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Paket</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('paket.create') }}" class="btn btn-success">Create New Data Paket</a>
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
                    <th>Nama Paket</th>
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
                @forelse($pakets as $paket)
                <tr>
                    <td>{{ $paket->id }}</td>
                    <td>{{ $paket->tanggal_keberangkatan }}</td>
                    <td>{{ $paket->tanggal_kepulangan }}</td>
                    <td>
                        <a href="{{ route('jamaah.index', ['paket' => $paket->id]) }}">
                            {{ $paket->nama_paket }}
                        </a>
                    </td>
                    <td>{{ $paket->hotel_madinah }}</td>
                    <td>{{ $paket->hotel_mekkah }}</td>
                    <td>{{ $paket->program }}</td>
                    <td>{{ number_format($paket->harga, 0, ',', '.') }}</td>
                    <td>{{ $paket->pesawat }}</td>
                    <td>{{ $paket->total_seat }}</td>
                    <td>{{ $paket->jamaahs->count() }}</td>
                    <td>{{ $paket->total_seat - $paket->jamaahs->count() }}</td>
                    <td>
                        <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('jamaah.index', ['paket' => $paket->id]) }}"
                            class="btn btn-info btn-sm">Detail</a>
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