<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data roles beserta relasi perusahaan
        $roles = Roles::with('perusahaan')->get();

        return response()->json($roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_perusahaan' => 'nullable|exists:data_perusahaans,id',
            'jenis_role' => 'required|in:Karyawan Pusat,Kepala Cabang,Karyawan Cabang',
        ]);

        // Buat role baru
        $role = Roles::create($validatedData);

        return response()->json(['message' => 'Role berhasil dibuat', 'data' => $role], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari role berdasarkan ID
        $role = Roles::with('perusahaan')->find($id);

        if (!$role) {
            return response()->json(['message' => 'Role tidak ditemukan'], 404);
        }

        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_data_perusahaan' => 'nullable|exists:data_perusahaans,id',
            'jenis_role' => 'required|in:Karyawan Pusat,Kepala Cabang,Karyawan Cabang',
        ]);

        // Cari role
        $role = Roles::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role tidak ditemukan'], 404);
        }

        // Update role
        $role->update($validatedData);

        return response()->json(['message' => 'Role berhasil diperbarui', 'data' => $role]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari role
        $role = Roles::find($id);

        if (!$role) {
            return response()->json(['message' => 'Role tidak ditemukan'], 404);
        }

        // Hapus role
        $role->delete();

        return response()->json(['message' => 'Role berhasil dihapus']);
    }
}
