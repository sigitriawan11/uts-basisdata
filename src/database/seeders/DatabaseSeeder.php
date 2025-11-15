<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\RumahSakit;
use App\Models\Poliklinik;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\JadwalPraktek;
use App\Models\Kunjungan;
use App\Models\Resep;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        $rumahSakit = RumahSakit::factory(5)->create();

        $rumahSakit->each(function ($rs) {
            Poliklinik::factory(5)->create([
                'rumah_sakit_id' => $rs->id
            ]);
        });

        Dokter::factory(40)->create();

        Pasien::factory(200)->create();

        Obat::factory(30)->create();

        JadwalPraktek::factory(100)->create();

        $kunjungan = Kunjungan::factory(300)->create();

        $kunjungan->each(function ($k) {
            Resep::factory(rand(0, 3))->create([
                'kunjungan_id' => $k->id
            ]);
        });
    }
}
