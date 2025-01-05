<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pembayarans';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_data_jamaahs',
        'tanggal_pembayaran',
        'jumlah_pembayaran',
        'keterangan',
        'penerima',
        'bukti_pembayaran',
    ];

    // Relasi ke tabel `jamaahs`
    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class, 'id_data_jamaahs');
    }
}
