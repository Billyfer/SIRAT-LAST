<?php



use App\Http\Controllers\{
    DashboardController,
    FasilitasController,
    ProfileController,
    JamaahController,
    PerusahaanCOntroller,
    KaryawanController,
    PaketController,
    PembayaranController,
    ReferralController,
    SuratController
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('/auth/register');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/master', function () {
        return view('master');
    })->name('master');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('jamaah', JamaahController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('referral', ReferralController::class);
    Route::resource('surat', SuratController::class);
    Route::resource('perusahaan', PerusahaanCOntroller::class);
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('fasilitas', FasilitasController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
