<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Jamaah; // Asumsi relasi dengan Jamaah
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('jamaah')->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jamaahs = Jamaah::all();
        return view('pembayaran.create', compact('jamaahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_data_jamaahs' => 'required|exists:jamaahs,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'penerima' => 'required|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('bukti_pembayaran')) {
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Pembayaran::create($validated);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $jamaahs = Jamaah::all();

        return view('pembayaran.edit', compact('pembayaran', 'jamaahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_data_jamaahs' => 'required|exists:jamaahs,id',
            'tanggal_pembayaran' => 'required|date',
            'jumlah_pembayaran' => 'required|integer|min:0',
            'keterangan' => 'required|string',
            'penerima' => 'required|string',
            'bukti_pembayaran' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        // Hapus file lama jika ada file baru yang diupload
        if ($request->hasFile('bukti_pembayaran')) {
            if ($pembayaran->bukti_pembayaran && Storage::exists('public/' . $pembayaran->bukti_pembayaran)) {
                Storage::delete('public/' . $pembayaran->bukti_pembayaran);
            }
            $validated['bukti_pembayaran'] = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        $pembayaran->update($validated);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        if ($pembayaran->bukti_pembayaran && Storage::exists('public/' . $pembayaran->bukti_pembayaran)) {
            Storage::delete('public/' . $pembayaran->bukti_pembayaran);
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
