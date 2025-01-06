<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pembayaran beserta relasi jamaah
        $pembayarans = Pembayaran::with('jamaah')->get();

        return response()->json($pembayarans);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_jamaahs' => 'required|exists:jamaahs,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'penerima' => 'required|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Max 2MB
        ]);

        // Upload file bukti pembayaran jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
            $validatedData['bukti_pembayaran'] = $filePath;
        }

        // Simpan data pembayaran
        $pembayaran = Pembayaran::create($validatedData);

        return response()->json(['message' => 'Pembayaran berhasil dibuat', 'data' => $pembayaran], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari pembayaran berdasarkan ID
        $pembayaran = Pembayaran::with('jamaah')->find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        return response()->json($pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_jamaahs' => 'required|exists:jamaahs,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'penerima' => 'required|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Max 2MB
        ]);

        // Cari pembayaran
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        // Upload file bukti pembayaran jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            // Hapus file lama jika ada
            if ($pembayaran->bukti_pembayaran && Storage::exists($pembayaran->bukti_pembayaran)) {
                Storage::delete($pembayaran->bukti_pembayaran);
            }

            $filePath = $request->file('bukti_pembayaran')->store('bukti_pembayaran');
            $validatedData['bukti_pembayaran'] = $filePath;
        }

        // Update data pembayaran
        $pembayaran->update($validatedData);

        return response()->json(['message' => 'Pembayaran berhasil diperbarui', 'data' => $pembayaran]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari pembayaran
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran tidak ditemukan'], 404);
        }

        // Hapus file bukti pembayaran jika ada
        if ($pembayaran->bukti_pembayaran && Storage::exists($pembayaran->bukti_pembayaran)) {
            Storage::delete($pembayaran->bukti_pembayaran);
        }

        // Hapus data pembayaran
        $pembayaran->delete();

        return response()->json(['message' => 'Pembayaran berhasil dihapus']);
    }
}
