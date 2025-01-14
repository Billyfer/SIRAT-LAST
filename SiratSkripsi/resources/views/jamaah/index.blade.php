{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col">
            <h2 class="text-center">Data Jamaah</h2>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('jamaah.create') }}" class="btn btn-success">Tambah Jamaah</a>
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
                    <th>Perusahaan</th>
                    <th>Code Referral</th>
                    <th>Dokumen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_jamaah as $jamaah)
                <tr>
                    <td>{{ $jamaah->id }}</td>
                    <td>{{ $jamaah->nama_jamaah ? $jamaah->nama_jamaah : 'Tidak Ada' }}</td>
                    <td>{{ $jamaah->alamat ? $jamaah->alamat : 'Tidak Ada' }}</td>
                    <td>{{ $jamaah->no_telpon ? $jamaah->no_telpon : 'Tidak Ada' }}</td>
                    <td>{{ $jamaah->paket->nama_paket ? $jamaah->paket->nama_paket : 'Tidak Ada' }}</td>
                    <td>{{ $jamaah->perusahaan->nama_perusahaan ? $jamaah->perusahaan->nama_perusahaan : 'Tidak Ada' }}
                    </td>
                    <td>{{ $jamaah->code_referals ? $jamaah->code_referals : 'Tidak Ada' }}</td>
                    <td>
                        @if($jamaah->kartu_keluarga)
                        <p><a href="{{ asset('storage/' . $jamaah->kartu_keluarga) }}" target="_blank">Kartu
                                Keluarga</a></p>
                        @endif
                        @if($jamaah->ktp)
                        <p><a href="{{ asset('storage/' . $jamaah->ktp) }}" target="_blank">KTP</a></p>
                        @endif
                        @if($jamaah->surat_kesehatan)
                        <p><a href="{{ asset('storage/' . $jamaah->surat_kesehatan) }}" target="_blank">Surat
                                Kesehatan</a></p>
                        @endif
                        @if($jamaah->visa)
                        <p><a href="{{ asset('storage/' . $jamaah->visa) }}" target="_blank">Visa</a></p>
                        @endif
                        @if($jamaah->surat_pendukung)
                        <p><a href="{{ asset('storage/' . $jamaah->surat_pendukung) }}" target="_blank">Surat
                                Pendukung</a></p>
                        @endif
                    </td>
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
                    <td colspan="9" class="text-center">Tidak ada data jamaah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection