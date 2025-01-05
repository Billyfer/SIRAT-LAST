<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'surats';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_data_perusahaans',
        'id_karyawans',
        'keterangan',
        'dokumen_surat',
        'note',
    ];

    // Relasi ke tabel `data_perusahaans`
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_data_perusahaans');
    }

    // Relasi ke tabel `karyawans`
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawans');
    }
}
