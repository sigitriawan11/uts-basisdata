<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pasien extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_pasien');
    }
}

