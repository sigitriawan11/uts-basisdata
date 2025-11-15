<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    public function definition(): array
    {
        return [
            'no_rm' => 'RM-' . $this->faker->unique()->numerify('######'),

            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),

            'tanggal_lahir' => $this->faker->dateTimeBetween('-80 years', '-1 years')->format('Y-m-d'),

            'nik' => $this->faker->optional()->passthrough(
                $this->faker->unique()->numerify('################')
            ),

            'no_bpjs' => $this->faker->optional()->passthrough(
                $this->faker->unique()->numerify('################')
            ),

            'telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),

            'kontak_darurat_nama' => $this->faker->optional()->name(),
            'kontak_darurat_hp' => $this->faker->optional()->phoneNumber(),
            'hubungan_kontak' => $this->faker->optional()->randomElement([
                'Ayah',
                'Ibu',
                'Suami',
                'Istri',
                'Anak',
                'Kakak',
                'Adik',
                'Teman'
            ]),

            'alergi' => $this->faker->optional()->passthrough(
                implode(', ', $this->faker->randomElements([
                    'Asma',
                    'Diabetes',
                    'Hipertensi',
                    'Alergi Obat',
                    'Alergi Debu'
                ], rand(0, 3)))
            ),

            'riwayat_penyakit' => $this->faker->optional()->passthrough(
                implode(', ', $this->faker->randomElements([
                    'Ginjal',
                    'Liver',
                    'Jantung',
                    'Kolesterol',
                    'Migrain'
                ], rand(0, 3)))
            ),

            'catatan_khusus' => $this->faker->randomElement([
                'Perlu pemantauan',
                'Alergi ringan',
                'Tidak ada',
                'Butuh perhatian khusus'
            ]),
        ];
    }
}
