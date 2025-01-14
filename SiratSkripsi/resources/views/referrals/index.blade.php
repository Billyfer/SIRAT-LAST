{{-- @extends('layouts.app') --}}
@extends('master.master')

@section('content')
<div class="container">
    <h1>Daftar Referral</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Total Referal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($referrals as $referral)
            <tr>
                <td>{{ $referral->karyawan->nama ?? 'Tidak ada data' }}</td>
                <td>{{ $referral->total_referals }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">Tidak ada data referral.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection