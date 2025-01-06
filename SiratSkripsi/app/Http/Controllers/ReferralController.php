<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data referral beserta relasi jamaah dan karyawan
        $referrals = Referral::with(['jamaah', 'karyawan'])->get();

        return response()->json($referrals);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_jamaahs' => 'nullable|exists:jamaahs,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'code_referals' => 'required|string|unique:referrals,code_referals',
            'total_referals' => 'nullable|integer|min:0',
        ]);

        // Buat referral baru
        $referral = Referral::create($validatedData);

        return response()->json(['message' => 'Referral berhasil dibuat', 'data' => $referral], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari referral berdasarkan ID
        $referral = Referral::with(['jamaah', 'karyawan'])->find($id);

        if (!$referral) {
            return response()->json(['message' => 'Referral tidak ditemukan'], 404);
        }

        return response()->json($referral);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_jamaahs' => 'nullable|exists:jamaahs,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'code_referals' => 'required|string|unique:referrals,code_referals,' . $id,
            'total_referals' => 'nullable|integer|min:0',
        ]);

        // Cari referral
        $referral = Referral::find($id);

        if (!$referral) {
            return response()->json(['message' => 'Referral tidak ditemukan'], 404);
        }

        // Update referral
        $referral->update($validatedData);

        return response()->json(['message' => 'Referral berhasil diperbarui', 'data' => $referral]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari referral
        $referral = Referral::find($id);

        if (!$referral) {
            return response()->json(['message' => 'Referral tidak ditemukan'], 404);
        }

        // Hapus referral
        $referral->delete();

        return response()->json(['message' => 'Referral berhasil dihapus']);
    }
}
