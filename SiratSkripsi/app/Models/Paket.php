<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pakets';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_perusahaan',
        'nama_paket',
        'tanggal_kepulangan',
        'tanggal_keberangkatan',
        'hotel_madinah',
        'hotel_mekkah',
        'program',
        'harga',
        'pesawat',
        'total_seat',
        'jenis_paket',
    ];

    // Relasi ke tabel `data_perusahaans`
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    // Relasi ke tabel `jamaahs`
    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class, 'id_paket');
    }
}
