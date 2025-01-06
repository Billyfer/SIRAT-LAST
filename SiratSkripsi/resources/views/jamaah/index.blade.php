{{-- Jamaah Index View --}}

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Jamaah</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('jamaah.create') }}" class="btn btn-success">Create New Jamaah</a>
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
                    <th>Nama Jamaah</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Paket</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_jamaah as $jamaah)
                    <tr>
                        <td>{{ $jamaah->id }}</td>
                        <td>{{ $jamaah->nama_jamaah }}</td>
                        <td>{{ $jamaah->alamat }}</td>
                        <td>{{ $jamaah->no_telpon }}</td>
                        <td><a href="{{ route('jamaah.index', ['paket' => $jamaah->paket->id]) }}">{{ $jamaah->paket->nama_paket }}</a></td>
                        <td>
                            <a href="{{ route('jamaah.edit', $jamaah->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('jamaah.destroy', $jamaah->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data jamaah.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection