<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;


    protected $table = 'karyawans';

    const ROLES = [
        'Karyawan Pusat',
        'Pimpinan Cabang',
        'Karyawan Cabang',
        'Pimpinan Pusat',
    ];
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
        return $this->belongsTo(Perusahaan::class, 'cabang_id');
    }
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'id_karyawans', 'id');
    }



    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
