<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableDataJamaah extends Model
{
    use HasFactory;

    protected $table = 'data_jamaahs';
    protected $fillable = [
        'tanggal_keberangkatan',
        'tanggal_kepulangan',
        'paket',
        'hotel_madinah',
        'hotel_mekkah',
        'program',
        'harga',
        'pesawat',
        'total_seat',
        'terisi',
        'sisa'
    ];

    public $timestamps = false;

}
