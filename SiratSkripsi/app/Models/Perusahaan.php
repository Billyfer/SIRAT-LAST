<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'data_perusahaans';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_cabang',
        'kota_kabupaten',
        'alamat',
        'nama_pimpinan',
        'nib_cabang',
        'pdf_nib',
        'pdf_akta_cabang',
    ];

    // Relasi ke tabel `karyawans`
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class, 'cabang_id');
    }

    // Relasi ke tabel `pakets`
    public function pakets()
    {
        return $this->hasMany(Paket::class, 'id_perusahaan');
    }
}
