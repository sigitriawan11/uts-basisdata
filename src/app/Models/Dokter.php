<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'sertifikasi' => 'array',
    ];

    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'id_poliklinik');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPraktek::class, 'id_dokter');
    }

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_dokter');
    }
}
