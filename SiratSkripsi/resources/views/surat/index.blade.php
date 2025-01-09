@extends('layouts.app')

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
                @forelse($surats as $surat)
                    <tr>
                        <td>{{ $surat->id }}</td>
                        <td>{{ $surat->perusahaan->nama_perusahaan ?? 'Tidak ada' }}</td>
                        <td>{{ $surat->karyawan->nama_karyawan ?? 'Tidak ada' }}</td>
                        <td>{{ $surat->keterangan }}</td>
                        <td>
                            @if($surat->dokumen_surat)
                                <a href="{{ asset('storage/' . $surat->dokumen_surat) }}" target="_blank">Lihat Dokumen</a>
                            @else
                                Tidak ada dokumen
                            @endif
                        </td>
                        <td>{{ $surat->note }}</td>
                        <td>
                            <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline">
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
