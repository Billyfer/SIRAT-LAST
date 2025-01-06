<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'dokumen_surat' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'note' => 'nullable|string',
        ]);

        $data = $request->all();

        // Upload file dokumen_surat dan simpan path
        if ($request->hasFile('dokumen_surat')) {
            $data['dokumen_surat'] = $request->file('dokumen_surat')->store('surat_documents', 'public');
        }

        // Buat surat baru
        $surat = Surat::create($data);

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
            'dokumen_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'note' => 'nullable|string',
        ]);

        $surat = Surat::find($id);

        if (!$surat) {
            return response()->json(['message' => 'Surat tidak ditemukan'], 404);
        }

        $data = $request->all();

        // Update file dokumen_surat dan hapus file lama jika ada
        if ($request->hasFile('dokumen_surat')) {
            if ($surat->dokumen_surat) {
                Storage::delete('public/' . $surat->dokumen_surat);
            }
            $data['dokumen_surat'] = $request->file('dokumen_surat')->store('surat_documents', 'public');
        }

        // Update data surat
        $surat->update($data);

        return response()->json(['message' => 'Surat berhasil diperbarui', 'data' => $surat]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $surat = Surat::find($id);

        if (!$surat) {
            return response()->json(['message' => 'Surat tidak ditemukan'], 404);
        }

        // Hapus file dokumen_surat jika ada
        if ($surat->dokumen_surat) {
            Storage::delete('public/' . $surat->dokumen_surat);
        }

        $surat->delete();

        return response()->json(['message' => 'Surat berhasil dihapus']);
    }
}
