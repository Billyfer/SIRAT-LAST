<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    use HasFactory;


    protected $table = 'jamaahs';


    protected $fillable = [
        'id_paket',
        'id_perusahaan',
        'id_karyawan',
        'nama_jamaah',
        'alamat',
        'kartu_keluarga',
        'ktp',
        'no_telpon',
        'surat_kesehatan',
        'visa',
        'surat_pendukung',
        'referrals',
    ];


    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }
}
