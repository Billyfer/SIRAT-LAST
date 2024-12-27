<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TableDataKaryawan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'karyawans';
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

    public function cabang()
    {
        return $this->belongsTo(TableDataJamaah::class, 'cabang_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
