{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Surat</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('surat.create') }}" class="btn btn-success">Tambah Surat</a>
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
                    <th>Perusahaan</th>
                    <th>Karyawan</th>
                    <th>Keterangan</th>
                    <th>Dokumen Surat</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_surat as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->perusahaan->nama_perusahaan ?? 'Tidak ada' }}</td>
                    <td>{{ $item->karyawan->nama_karyawan ?? 'Tidak ada' }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        @if($item->dokumen_surat)
                        <a href="{{ asset('storage/' . $item->dokumen_surat) }}" target="_blank">Lihat Dokumen</a>
                        @else
                        Tidak ada dokumen
                        @endif
                    </td>
                    <td>{{ $item->note }}</td>
                    <td>
                        <a href="{{ route('surat.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection