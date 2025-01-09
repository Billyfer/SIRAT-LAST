<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Paket;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $fasilitas = Fasilitas::with('paket')->get();

        return view('fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $pakets = Paket::all();

        return view('fasilitas.create', compact('pakets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'peralatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);


        Fasilitas::create($validatedData);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Ambil data fasilitas berdasarkan ID
        $fasilitas = Fasilitas::with('paket')->findOrFail($id);

        return view('fasilitas.show', compact('fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data fasilitas dan paket
        $fasilitas = Fasilitas::findOrFail($id);
        $pakets = Paket::all();

        return view('fasilitas.edit', compact('fasilitas', 'pakets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'peralatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);


        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update($validatedData);

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data fasilitas
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->route('fasilitas.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
