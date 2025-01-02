<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\PerusahaanCOntroller;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\SuratController;
use App\Models\Referral;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('master');
})->middleware(['auth', 'verified'])->name('master');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
    // Route::get('/jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
    // Route::post('/jamaah', [JamaahController::class, 'store'])->name('jamaah.store');
    // Route::get('/jamaah/{id}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
    // Route::delete('/jamaah/{id}/delete', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
    // route::patch('/jamaah/{id}/update', [JamaahController::class, 'update'])->name('jamaah.update');

    Route::resource('jamaah', JamaahController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
    // Route::get('/jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
    // Route::post('/jamaah', [JamaahController::class, 'store'])->name('jamaah.store');
    // Route::get('/jamaah/{id}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
    // Route::delete('/jamaah/{id}/delete', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
    // route::patch('/jamaah/{id}/update', [JamaahController::class, 'update'])->name('jamaah.update');

    Route::resource('paket', PaketController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
    // Route::get('/jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
    // Route::post('/jamaah', [JamaahController::class, 'store'])->name('jamaah.store');
    // Route::get('/jamaah/{id}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
    // Route::delete('/jamaah/{id}/delete', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
    // route::patch('/jamaah/{id}/update', [JamaahController::class, 'update'])->name('jamaah.update');

    Route::resource('pembayaran', PembayaranController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
    // Route::get('/jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
    // Route::post('/jamaah', [JamaahController::class, 'store'])->name('jamaah.store');
    // Route::get('/jamaah/{id}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
    // Route::delete('/jamaah/{id}/delete', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
    // route::patch('/jamaah/{id}/update', [JamaahController::class, 'update'])->name('jamaah.update');

    Route::resource('referral', ReferralController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
    // Route::get('/jamaah/create', [JamaahController::class, 'create'])->name('jamaah.create');
    // Route::post('/jamaah', [JamaahController::class, 'store'])->name('jamaah.store');
    // Route::get('/jamaah/{id}/edit', [JamaahController::class, 'edit'])->name('jamaah.edit');
    // Route::delete('/jamaah/{id}/delete', [JamaahController::class, 'destroy'])->name('jamaah.destroy');
    // route::patch('/jamaah/{id}/update', [JamaahController::class, 'update'])->name('jamaah.update');

    Route::resource('surat', SuratController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/perusahaan', [PerusahaanCOntroller::class, 'index'])->name('perusahaan.index');
    // Route::get('/perusahaan/create', [PerusahaanCOntroller::class, 'create'])->name('perusahaan.create');
    // Route::post('/perusahaan', [PerusahaanCOntroller::class, 'store'])->name('perusahaan.store');
    // Route::get('/perusahaan/{id}/edit', [PerusahaanCOntroller::class, 'edit'])->name('perusahaan.edit');
    // Route::delete('/perusahaan/{id}/delete', [PerusahaanCOntroller::class, 'destroy'])->name('perusahaan.destroy');
    // route::patch('/perusahaan/{id}/update', [PerusahaanCOntroller::class, 'update'])->name('perusahaan.update');
    Route::resource('perusahaan', PerusahaanCOntroller::class);
});

Route ::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    // Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    // Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    // Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    // Route::delete('/karyawan/{id}/delete', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
    // route::patch('/karyawan/{id}/update', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::resource('karyawan', KaryawanController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

