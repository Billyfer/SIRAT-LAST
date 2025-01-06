<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::with('jamaahs')->get(); // Ambil semua data 'pakets' dengan relasi
        return view('paket.index', compact('pakets')); // Kirim variabel 'pakets' ke view
    }

    public function create()
    {
        return view('paket.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'tanggal_keberangkatan' => 'required|date',
            'tanggal_kepulangan' => 'required|date',
            'hotel_madinah' => 'required|string|max:255',
            'hotel_mekkah' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'pesawat' => 'required|string|max:255',
            'total_seat' => 'required|numeric',
            'jenis_paket' => 'required|boolean',
        ]);

        Paket::create($validated);

        return redirect()->route('paket.index')
            ->with('success', 'Paket created successfully.');
    }

    public function edit($id)
    {
        $data_paket = Paket::findOrFail($id);
        return view('paket.edit', compact('data_paket'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'tanggal_keberangkatan' => 'required|date',
            'tanggal_kepulangan' => 'required|date',
            'hotel_madinah' => 'required|string|max:255',
            'hotel_mekkah' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'pesawat' => 'required|string|max:255',
            'total_seat' => 'required|numeric',
            'jenis_paket' => 'required|boolean',
        ]);

        $data_paket = Paket::findOrFail($id);
        $data_paket->update($validated);

        return redirect()->route('paket.index')
            ->with('success', 'Data Paket updated successfully');
    }

    public function destroy($id)
    {
        $data_paket = Paket::findOrFail($id);
        $data_paket->delete();

        return redirect()->route('paket.index')
            ->with('success', 'Data paket deleted successfully');
    }
}
