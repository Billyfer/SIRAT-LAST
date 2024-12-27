<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TableDataPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'data_perusahaans';
    protected $fillable = [
        'nama_cabang',
        'kota_kabupaten',
        'alamat',
        'nama_pimpinan',
        'nib_cabang',
        'pdf_nib',
        'pdf_akta_cabang',
    ];

    public function karyawans(): HasMany
    {
        return $this->hasMany(TableDataKaryawan::class, 'cabang_id');
    }
}
