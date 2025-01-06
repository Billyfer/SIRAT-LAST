<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Storage;

class JamaahController extends Controller
{
    public function index()
    {
        $data_jamaah = Jamaah::with(['paket', 'perusahaan'])->get();
        return view('jamaah.index', compact('data_jamaah'));
    }

    public function create()
    {
        $pakets = Paket::all();
        $perusahaans = Perusahaan::all();
        return view('jamaah.create', compact('pakets', 'perusahaans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'id_perusahaan' => 'required|exists:perusahaans,id',
            'nama_jamaah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'no_telpon' => 'required|string|max:15',
            'surat_kesehatan' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'visa' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'surat_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $data = $request->all();

        foreach (['kartu_keluarga', 'ktp', 'surat_kesehatan', 'visa', 'surat_pendukung'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $data[$fileField] = $request->file($fileField)->store('jamaah_documents', 'public');
            }
        }

        Jamaah::create($data);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jamaah = Jamaah::find($id);
        $pakets = Paket::all();
        $perusahaans = Perusahaan::all();

        if (!$jamaah) {
            return redirect()->route('jamaah.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('jamaah.edit', compact('jamaah', 'pakets', 'perusahaans'));
    }

    public function update(Request $request, $id)
    {
        $jamaah = Jamaah::find($id);

        if (!$jamaah) {
            return redirect()->route('jamaah.index')->with('error', 'Data tidak ditemukan.');
        }

        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'id_perusahaan' => 'required|exists:perusahaans,id',
            'nama_jamaah' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kartu_keluarga' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'no_telpon' => 'required|string|max:15',
            'surat_kesehatan' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'visa' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'surat_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ]);

        $data = $request->all();

        foreach (['kartu_keluarga', 'ktp', 'surat_kesehatan', 'visa', 'surat_pendukung'] as $fileField) {
            if ($request->hasFile($fileField)) {
                if ($jamaah->$fileField) {
                    Storage::delete('public/' . $jamaah->$fileField);
                }
                $data[$fileField] = $request->file($fileField)->store('jamaah_documents', 'public');
            }
        }

        $jamaah->update($data);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jamaah = Jamaah::find($id);

        if (!$jamaah) {
            return redirect()->route('jamaah.index')->with('error', 'Data tidak ditemukan.');
        }

        foreach (['kartu_keluarga', 'ktp', 'surat_kesehatan', 'visa', 'surat_pendukung'] as $fileField) {
            if ($jamaah->$fileField) {
                Storage::delete('public/' . $jamaah->$fileField);
            }
        }

        $jamaah->delete();

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil dihapus.');
    }
}
