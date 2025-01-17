@extends('master.master')
@section('title', 'Dashboard Umrah')
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Welcome Section -->
    <div class="card shadow mb-4">
      <div class="card-body text-center">
        <h1 class="text-primary">Selamat Datang di SIRAT Arraudhah Tour & Travel</h1>
        <p class="text-muted">Hai, {{ Auth::user()->name }} 👋! Semoga harimu menyenangkan!</p>
      </div>
    </div>

    <!-- Statistik & Info -->
    <div class="row">
      <!-- Total Jamaah -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Total Jamaah</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJamaah }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Referal -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                  Total Referal</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReferral }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-handshake fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Paket Umrah -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                  Paket Umrah</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPaketUmrah }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-kaaba fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Gambar dan Deskripsi -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <img class="img-fluid rounded" src="{{ asset('img/paket_umroh.png') }}" alt="Paket Umrah">
          </div>
          <div class="col-lg-6">
            <h3 class="text-primary">Kenapa Memilih Kami?</h3>
            <p class="text-muted">Kami memberikan pelayanan terbaik untuk perjalanan ibadah umrah dan haji Anda. Dengan pengalaman lebih dari 10 tahun, kami hadir untuk melayani kebutuhan Anda dengan profesionalisme dan dedikasi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
