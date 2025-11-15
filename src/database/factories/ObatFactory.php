<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObatFactory extends Factory
{
    public function definition(): array
    {
        $kategori = [
            'Antibiotik',
            'Analgesik',
            'Antipiretik',
            'Vitamin',
            'Antiseptik',
            'Antialergi',
            'Antasida',
        ];

        $bentuk = [
            'Tablet',
            'Kapsul',
            'Sirup',
            'Salep',
            'Injeksi',
            'Tetes Mata',
            'Tetes Telinga',
        ];

        return [
            'kode_obat' => 'OBT-' . $this->faker->unique()->bothify('??###'),
            'nama_obat'      => fake()->randomElement([
                'Paracetamol',
                'Amoxicillin',
                'Cetirizine',
                'Ibuprofen',
                'Vitamin C',
                'Ranitidine',
                'Gentamicin',
                'Omeprazole'
            ]),
            'kategori'       => fake()->randomElement($kategori),
            'bentuk'         => fake()->randomElement($bentuk),
            'satuan_dosis'   => fake()->randomElement(['mg', 'ml', 'gr', 'IU']),
            'aturan_default' => fake()->randomElement([
                '3x1 sehari',
                '2x1 sehari',
                '1x1 sehari',
                'Jika diperlukan'
            ]),

            'stok'           => fake()->numberBetween(0, 500),
            'stok_minimum'   => fake()->numberBetween(5, 50),
            'kadaluarsa'     => fake()->dateTimeBetween('+6 months', '+5 years'),

            'harga_modal'    => fake()->randomFloat(2, 5000, 150000),
            'harga_jual'     => fn(array $attr) => $attr['harga_modal'] + fake()->numberBetween(1000, 50000),

            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
