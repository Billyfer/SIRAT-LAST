<?php

namespace App\Http\Controllers;

use App\Models\TableDataJamaah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class JamaahController extends Controller
{
    use HasFactory;

    protected $table = 'table_data_jamaah';
    public function index()
{
    $data_jamaahs = TableDataJamaah::all();
    return view('jamaah.index', compact('data_jamaahs'));
}


    public function create()
    {
        return view('jamaah.create');
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'tanggal_keberangkatan' => 'required|date',
        'tanggal_kepulangan' => 'required|date',
        'paket' => 'required|string|max:255',
        'hotel_madinah' => 'required|string|max:255',
        'hotel_mekkah' => 'required|string|max:255',
        'program' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'pesawat' => 'required|string|max:255',
        'total_seat' => 'required|numeric',
        'terisi' => 'required|numeric',
        'sisa' => 'required|numeric',
    ]);
    

    TableDataJamaah::create($validated);

    return redirect()->route('jamaah.index')
        ->with('success', 'Data Jamaah created successfully.');
    }


    public function edit($id)
    {
        $data_jamaah = TableDataJamaah::findOrFail($id);
        return view('jamaah.edit', compact('data_jamaah'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_keberangkatan' => 'required|date',
            'tanggal_kepulangan' => 'required|date',
            'paket' => 'required|string|max:255',
            'hotel_madinah' => 'required|string|max:255',
            'hotel_mekkah' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'pesawat' => 'required|string|max:255',
            'total_seat' => 'required|numeric',
            'terisi' => 'required|numeric',
            'sisa' => 'required|numeric',
        ]);

        $data_jamaah = TableDataJamaah::findOrFail($id);
        $data_jamaah->update($validated);

        return redirect()->route('jamaah.index')
            ->with('success', 'Data Jamaah updated successfully');
    }

    public function destroy($id)
    {
        $data_jamaah = TableDataJamaah::findOrFail($id);
        $data_jamaah->delete();

        return redirect()->route('jamaah.index')
            ->with('success', 'Data Jamaah deleted successfully');
    }
}
