{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Pembayaran</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('pembayaran.create') }}" class="btn btn-success">Tambah Pembayaran</a>
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
                    <th>Tanggal Pembayaran</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Keterangan</th>
                    <th>Penerima</th>
                    <th>Bukti Pembayaran</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->id }}</td>
                    <td>{{ $pembayaran->jamaah->nama_jamaah }}</td>
                    <td>{{ $pembayaran->tanggal_pembayaran }}</td>
                    <td>{{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</td>
                    <td>{{ $pembayaran->keterangan }}</td>
                    <td>{{ $pembayaran->penerima }}</td>
                    <td>
                        @if($pembayaran->bukti_pembayaran)
                        <a href="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" target="_blank">Lihat</a>
                        @else
                        Tidak Ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}"
                            class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection