<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

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
            'pdf_nib' => 'required',
            'pdf_akta_cabang' => 'required',
        ]);

        Perusahaan::create($request->all());

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
            'pdf_nib' => 'required',
            'pdf_akta_cabang' => 'required',
        ]);

        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
        }

        $data_perusahaan->update($request->all());

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data Perusahaan berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $data_perusahaan = Perusahaan::find($id);

        if (!$data_perusahaan) {
            return redirect()->route('perusahaan.index')->with('error', 'Data tidak ditemukan.');
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
