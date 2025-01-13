<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Perusahaan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    public function index()
    {
        $data_surat = Surat::with(['perusahaan', 'karyawan'])->get();
        return view('surat.index', compact('data_surat'));
    }

    public function create()
    {
        $perusahaans = Perusahaan::all();
        $karyawans = Karyawan::all();
        return view('surat.create', compact('perusahaans', 'karyawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_data_perusahaans' => 'nullable|exists:data_perusahaans,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'keterangan' => 'required|string',
            'dokumen_surat' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'note' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen_surat')) {
            $data['dokumen_surat'] = $request->file('dokumen_surat')->store('surat_documents', 'public');
        }

        Surat::create($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dibuat.');
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $perusahaans = Perusahaan::all();
        $karyawans = Karyawan::all();
        return view('surat.edit', compact('surat', 'perusahaans', 'karyawans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_data_perusahaans' => 'nullable|exists:data_perusahaans,id',
            'id_karyawans' => 'nullable|exists:karyawans,id',
            'keterangan' => 'required|string',
            'dokumen_surat' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'note' => 'nullable|string',
        ]);

        $surat = Surat::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('dokumen_surat')) {
            if ($surat->dokumen_surat) {
                Storage::delete('public/' . $surat->dokumen_surat);
            }
            $data['dokumen_surat'] = $request->file('dokumen_surat')->store('surat_documents', 'public');
        }

        $surat->update($data);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);

        if ($surat->dokumen_surat) {
            Storage::delete('public/' . $surat->dokumen_surat);
        }

        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }
}
