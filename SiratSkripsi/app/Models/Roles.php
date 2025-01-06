<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_data_perusahaan',
        'jenis_role',
    ];

    /**
     * Get the associated perusahaan (company).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_data_perusahaan');
    }
}
