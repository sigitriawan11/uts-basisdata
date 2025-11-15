<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Poliklinik;

class KunjunganFactory extends Factory
{
    public function definition(): array
    {
        $kedatangan = fake()->dateTimeBetween('-7 days', 'now');
        $mulai = (clone $kedatangan)->modify('+' . fake()->numberBetween(1, 30) . ' minutes');
        $selesai = (clone $mulai)->modify('+' . fake()->numberBetween(5, 30) . ' minutes');

        return [
            'pasien_id'        => Pasien::factory(),
            'dokter_id'        => Dokter::factory(),
            'poliklinik_id'    => Poliklinik::factory(),

            'no_antrian'       => fake()->randomElement([
                null,
                str_pad(fake()->numberBetween(1, 99), 3, '0', STR_PAD_LEFT)
            ]),

            'waktu_kedatangan' => $kedatangan,
            'waktu_dilayani'   => $mulai,
            'waktu_selesai'    => $selesai,

            'keluhan'          => fake()->sentence(),
            'diagnosa_awal'    => fake()->optional()->sentence(),
            'diagnosa_akhir'   => fake()->optional()->sentence(),

            'pemeriksaan_fisik' => json_encode([
                'mata' => 'normal',
                'telinga' => 'normal',
            ]),

            'vital_sign' => json_encode([
                'suhu' => '36.5',
                'nadi' => '88',
            ]),

            'tindakan' => json_encode([
                'cek_fisik',
                'pemberian_obat',
            ]),

            'jenis_pembiayaan' => fake()->randomElement(['umum', 'bpjs', 'asuransi', 'lainnya']),
            'biaya_kunjungan'  => fake()->randomFloat(2, 0, 300000),

            'status' => fake()->randomElement(['menunggu', 'dilayani', 'selesai', 'batal']),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
