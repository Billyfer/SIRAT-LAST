<?php

namespace App\Http\Controllers;


use App\Models\Paket;
use App\Models\Jamaah;
use App\Models\Referral;
use Illuminate\Http\Request;

class dashboardController extends Controller
{



public function dashboard()
{
    $totalJamaah = Jamaah::count(); 
    $totalReferral = Referral::count(); 
    $totalPaketUmrah = Paket::count(); 

    return view('dashboard', compact('totalJamaah', 'totalReferral', 'totalPaketUmrah'));
}

}