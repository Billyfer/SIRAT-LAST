<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;


    protected $table = 'pakets';


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


    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }


    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class, 'id_paket');
    }
}
