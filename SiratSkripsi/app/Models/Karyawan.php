<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'karyawans';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama',
        'role',
        'cabang_id',
        'email',
        'no_wa',
        'alamat',
        'username',
        'password',
    ];

    // Relasi ke tabel `data_perusahaans`
    public function cabang()
    {
        return $this->belongsTo(Perusahaan::class, 'cabang_id');
    }

    /**
     * Mutator untuk mengenkripsi password saat disimpan.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
