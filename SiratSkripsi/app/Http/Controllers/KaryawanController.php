<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Include relasi jika perlu (referrals, cabang)
        $data_karyawans = Karyawan::with('referrals', 'cabang')->get();
        return view('karyawan.index', compact('data_karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|in:' . implode(',', Karyawan::ROLES),
            'cabang_id' => 'nullable|exists:data_perusahaans,id',
            'email' => 'required|email|unique:karyawans,email',
            'no_wa' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'username' => 'required|string|unique:karyawans,username|max:50',
            'password' => 'required|string|min:8',
        ]);

        Karyawan::create([
            'nama' => $request->nama,
            'role' => $request->role,
            'cabang_id' => $request->cabang_id,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data Karyawan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'role' => 'required|in:' . implode(',', Karyawan::ROLES),
            'cabang_id' => 'nullable|exists:data_perusahaans,id',
            'email' => 'required|email|unique:karyawans,email,' . $karyawan->id,
            'no_wa' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'username' => 'required|string|unique:karyawans,username,' . $karyawan->id,
            'password' => 'nullable|string|min:8',
        ]);

        $karyawanData = [
            'nama' => $request->nama,
            'role' => $request->role,
            'cabang_id' => $request->cabang_id,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat,
            'username' => $request->username,
        ];

        if ($request->password) {
            $karyawanData['password'] = bcrypt($request->password);
        }

        $karyawan->update($karyawanData);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data Karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        // Hapus referral terkait (jika ada relasi)
        $karyawan->referrals()->delete();

        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data Karyawan berhasil dihapus.');
    }
}
