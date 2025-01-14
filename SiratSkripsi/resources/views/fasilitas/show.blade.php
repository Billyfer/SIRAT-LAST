{{-- @extends('layouts.app') --}}
@extends('master.master')
@section('content')
<div class="container">
    <h1>Detail Fasilitas</h1>
    <h3>Paket: {{ $fasilitas->paket->nama_paket ?? 'Tidak diketahui' }}</h3>

    <ul>
        <li><strong>Peralatan:</strong> {{ $fasilitas->peralatan }}</li>
        <li><strong>Keterangan:</strong> {{ $fasilitas->keterangan }}</li>
    </ul>

    <a href="{{ route('fasilitas.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection