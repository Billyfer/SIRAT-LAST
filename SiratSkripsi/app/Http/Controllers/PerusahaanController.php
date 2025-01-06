<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{

    public function index()
    {
        $data_perusahaan = Perusahaan::all();
        return view('perusahaan.index', compact('data_perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota_kabupaten' => 'required',
            'alamat' => 'required',
            'nama_pimpinan' => 'required', 
            'nib_cabang' => 'required',
            'pdf_nib' => 'required|file|mimes:pdf|max:2048',
            'pdf_akta_cabang' => 'required|file|mimes:pdf|max:2048',
        ]);

        $data = $request->all();

        // Upload PDF files and store paths
        if ($request->hasFile('pdf_nib')) {
            $data['pdf_nib'] = $request->file('pdf_nib')->store('perusahaan_documents', 'public');
        }
        if ($request->hasFile('pdf_akta_cabang')) {
            $data['pdf_akta_cabang'] = $request->file('pdf_akta_cabang')->store('perusahaan_documents', 'public');
        }

        Perusahaan::create($data);

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data Perusahaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('perusahaan.edit', compact('data_perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota_kabupaten' => 'required',
            'alamat' => 'required',
            'nama_pimpinan' => 'required', 
            'nib_cabang' => 'required',
            'pdf_nib' => 'nullable|file|mimes:pdf|max:2048',
            'pdf_akta_cabang' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
        }

        $data = $request->all();

        // Update PDF files and delete old files if replaced
        if ($request->hasFile('pdf_nib')) {
            if ($data_perusahaan->pdf_nib) {
                Storage::delete('public/' . $data_perusahaan->pdf_nib);
            }
            $data['pdf_nib'] = $request->file('pdf_nib')->store('perusahaan_documents', 'public');
        }

        if ($request->hasFile('pdf_akta_cabang')) {
            if ($data_perusahaan->pdf_akta_cabang) {
                Storage::delete('public/' . $data_perusahaan->pdf_akta_cabang);
            }
            $data['pdf_akta_cabang'] = $request->file('pdf_akta_cabang')->store('perusahaan_documents', 'public');
        }

        $data_perusahaan->update($data);

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data Perusahaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
        }

        // Delete PDF files if exist
        if ($data_perusahaan->pdf_nib) {
            Storage::delete('public/' . $data_perusahaan->pdf_nib);
        }
        if ($data_perusahaan->pdf_akta_cabang) {
            Storage::delete('public/' . $data_perusahaan->pdf_akta_cabang);
        }

        $data_perusahaan->delete();

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data Perusahaan berhasil dihapus.');
    }

    public function show($id)
    {
        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('perusahaan.show', compact('data_perusahaan'));
    }
}
