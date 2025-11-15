<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kunjungan;
use App\Models\Obat;

class ResepFactory extends Factory
{
    public function definition(): array
    {
        $jumlah = fake()->numberBetween(1, 10);
        $hargaSatuan = fake()->randomFloat(2, 5000, 150000);

        return [
            'kunjungan_id' => Kunjungan::factory(),
            'obat_id'      => Obat::factory(),

            'jumlah'       => $jumlah,
            'dosis'        => fake()->optional()->randomElement([
                '1 tablet',
                '2 tablet',
                '5 ml',
                '10 ml',
            ]),
            'frekuensi'    => fake()->optional()->randomElement([
                '1x sehari',
                '2x sehari',
                '3x sehari',
                'Jika perlu saja'
            ]),
            'durasi'       => fake()->optional()->randomElement([
                '3 hari',
                '5 hari',
                '7 hari',
                '10 hari'
            ]),
            'cara_pakai'   => fake()->optional()->randomElement([
                'Diminum setelah makan',
                'Diminum sebelum makan',
                'Oleskan tipis-tipis',
                'Teteskan pada area yang sakit'
            ]),
            'catatan'      => fake()->optional()->sentence(),

            'harga_satuan' => $hargaSatuan,
            'subtotal'     => $jumlah * $hargaSatuan,

            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
