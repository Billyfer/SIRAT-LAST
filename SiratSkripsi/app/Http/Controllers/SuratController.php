<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data surat
        $surats = Surat::with(['perusahaan', 'karyawan'])->get();

        return response()->json($surats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_data_perusahaans' => 'nullable|exists:data_perusahaans,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'keterangan' => 'required|string',
            'dokumen_surat' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Buat surat baru
        $surat = Surat::create($validatedData);

        return response()->json(['message' => 'Surat berhasil dibuat', 'data' => $surat], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data surat berdasarkan ID
        $surat = Surat::with(['perusahaan', 'karyawan'])->find($id);

        if (!$surat) {
            return response()->json(['message' => 'Surat tidak ditemukan'], 404);
        }

        return response()->json($surat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_data_perusahaans' => 'nullable|exists:data_perusahaans,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'keterangan' => 'required|string',
            'dokumen_surat' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Cari surat
        $surat = Surat::find($id);

        if (!$surat) {
            return response()->json(['message' => 'Surat tidak ditemukan'], 404);
        }

        // Update data surat
        $surat->update($validatedData);

        return response()->json(['message' => 'Surat berhasil diperbarui', 'data' => $surat]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari surat
        $surat = Surat::find($id);

        if (!$surat) {
            return response()->json(['message' => 'Surat tidak ditemukan'], 404);
        }

        // Hapus surat
        $surat->delete();

        return response()->json(['message' => 'Surat berhasil dihapus']);
    }
}
