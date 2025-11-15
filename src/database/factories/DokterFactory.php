<?php

namespace Database\Factories;

use App\Models\Poliklinik;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokterFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_dokter' => 'DR-' . $this->faker->unique()->numerify('#####'),

            'nama' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),

            'spesialisasi' => $this->faker->randomElement([
                'Umum',
                'Anak',
                'Bedah',
                'Saraf',
                'Gigi',
                'Kulit',
                'Mata',
                'THT',
                'Jantung',
                'Paru'
            ]),

            'sub_spesialis' => $this->faker->optional()->randomElement([
                'Bedah Saraf',
                'Gastroenterologi',
                'Kardiologi Intervensi',
                'Onkologi',
                'Orthopedi Tulang Belakang',
                null
            ]),

            'sip' => $this->faker->optional()->numerify('SIP########'),
            'str' => $this->faker->optional()->numerify('STR########'),

            'pendidikan_terakhir' => $this->faker->optional()->randomElement([
                'S.Ked',
                'Sp.A',
                'Sp.B',
                'Sp.PD',
                'Sp.OG',
                'Sp.THT',
                'Sp.M'
            ]),

            'sertifikasi' => $this->faker->randomElements([
                'ACLS',
                'BLS',
                'ATLS',
                'PPGD',
                'Hiperkes',
                'BTCLS'
            ], rand(1, 3)),

            'telepon' => $this->faker->optional()->phoneNumber(),
            'email' => $this->faker->optional()->safeEmail(),

            'poliklinik_id' => Poliklinik::factory(),

            'status_aktif' => $this->faker->boolean(90),
        ];
    }
}
