<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dokter;

class JadwalPraktekFactory extends Factory
{
    public function definition(): array
    {
        $hariList = [
            'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
        ];

        $jamMulai = fake()->time('H:i', '08:00', '15:00');
        $durasi = fake()->randomElement([30, 60, 90, 120]);
        $jamSelesai = date('H:i', strtotime($jamMulai . " + {$durasi} minutes"));

        return [
            'dokter_id'      => Dokter::factory(),
            'hari'           => fake()->randomElement($hariList),

            'jam_mulai'      => $jamMulai,
            'jam_selesai'    => $jamSelesai,

            'kuota_pasien'   => fake()->numberBetween(10, 50),
            'perlu_antrian'  => fake()->boolean(80),
            'telemedicine'   => fake()->boolean(30),

            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
