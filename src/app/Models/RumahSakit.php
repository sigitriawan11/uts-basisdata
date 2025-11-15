<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class RumahSakit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function poliklinik()
    {
        return $this->hasMany(Poliklinik::class, 'id_rumah_sakit');
    }
}
