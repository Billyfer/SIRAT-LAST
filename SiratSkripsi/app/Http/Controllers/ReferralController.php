<?php

namespace App\Http\Controllers;

use App\Models\Referral;

class ReferralController extends Controller
{
    public function index()
    {
        // Ambil semua data referral dengan relasi karyawan
        $referrals = Referral::with('karyawan')->get();

        return view('referrals.index', compact('referrals'));
    }
}
