<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jamaah;
use App\Models\Paket;
use App\Models\Perusahaan;
use App\Models\Referral;
use App\Models\Karyawan;
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
        $karyawans = Karyawan::all();
        return view('jamaah.create', compact('pakets', 'perusahaans', 'karyawans'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'id_paket' => 'required|exists:pakets,id',
            'id_perusahaan' => 'required|exists:perusahaans,id',
            'id_karyawan' => 'nullable|exists:karyawans,id',
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

        // Simpan file jika ada
        foreach (['kartu_keluarga', 'ktp', 'surat_kesehatan', 'visa', 'surat_pendukung'] as $fileField) {
            if ($request->hasFile($fileField)) {
                $data[$fileField] = $request->file($fileField)->store('jamaah_documents', 'public');
            }
        }

        // Tambahkan referral jika ID karyawan diisi
        if ($request->id_karyawan) {
            $referral = Referral::firstOrCreate(
                ['id_karyawans' => $request->id_karyawan],
                ['total_referals' => 0]
            );
            $referral->increment('total_referals');
        }

        Jamaah::create($data);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $jamaah = Jamaah::find($id);

        if (!$jamaah) {
            return redirect()->route('jamaah.index')->with('error', 'Data tidak ditemukan.');
        }

        // Hapus file yang terkait
        foreach (['kartu_keluarga', 'ktp', 'surat_kesehatan', 'visa', 'surat_pendukung'] as $fileField) {
            if ($jamaah->$fileField) {
                Storage::delete('public/' . $jamaah->$fileField);
            }
        }

        // Kurangi total referal jika ID karyawan terkait ditemukan
        if ($jamaah->id_karyawan) {
            $referral = Referral::where('id_karyawans', $jamaah->id_karyawan)->first();
            if ($referral && $referral->total_referals > 0) {
                $referral->decrement('total_referals');
                if ($referral->total_referals === 0) {
                    $referral->delete();
                }
            }
        }

        $jamaah->delete();

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil dihapus.');
    }
}
