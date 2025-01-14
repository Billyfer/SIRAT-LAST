{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container">
    <h1>Daftar Fasilitas</h1>
    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">Tambah Peralatan</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Paket</th>
                <th>Nama Paket</th>
                <th>Jenis Paket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($fasilitas as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->paket->nomor_paket ?? '-' }}</td>
                <td>{{ $item->paket->nama_paket ?? '-' }}</td>
                <td>{{ $item->paket->jenis_paket ?? '-' }}</td>
                <td>
                    <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('fasilitas.show', $item->id) }}" class="btn btn-info btn-sm">Lihat Peralatan</a>
                    <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tidak ada data fasilitas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection