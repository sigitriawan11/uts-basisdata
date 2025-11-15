<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poliklinik extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'fasilitas' => 'array',
        'butuh_ruang_tindakan' => 'boolean',
    ];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumah_sakit');
    }

    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id_poliklinik');
    }
}
