<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'referrals';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_data_jamaahs',
        'id_karyawans',
        'total_referrals',
    ];

    // Relasi ke tabel `jamaahs`
    public function jamaah()
    {
        return $this->belongsTo(Jamaah::class, 'id_data_jamaahs');
    }

    // Relasi ke tabel `karyawans`
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawans');
    }
}
