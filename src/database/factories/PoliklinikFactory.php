<?php

namespace Database\Factories;

use App\Models\RumahSakit;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoliklinikFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rumah_sakit_id' => RumahSakit::factory(),

            'kode_poli' => 'POLI-' . $this->faker->unique()->numerify('###'),
            'nama_poli' => $this->faker->randomElement([
                'Poli Umum',
                'Poli Gigi',
                'Poli Anak',
                'Poli Saraf',
                'Poli Bedah',
                'Poli Mata',
                'Poli Kulit'
            ]),

            'kategori' => $this->faker->randomElement([
                'umum', 'gigi', 'spesialis', 'bedah', 'anak', 'kulit'
            ]),

            'kapasitas_per_hari' => $this->faker->numberBetween(20, 150),

            'butuh_ruang_tindakan' => $this->faker->boolean(20),

            'fasilitas' => $this->faker->randomElements([
                'AC',
                'TV',
                'Ruang Tunggu',
                'Antrian Elektronik',
                'Toilet',
                'Kursi Roda',
            ], rand(1, 5)),
        ];
    }
}
