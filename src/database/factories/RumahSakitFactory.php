<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RumahSakitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_rs' => 'RS-' . $this->faker->unique()->numerify('#####'),
            'nama' => $this->faker->company . ' Hospital',
            'kelas_rs' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'akreditasi' => $this->faker->randomElement(['Paripurna', 'Utama', 'Madya', 'Dasar']),
            'penyelenggara' => $this->faker->randomElement(['Pemerintah', 'Swasta', 'TNI', 'Polri']),
            'alamat' => $this->faker->address,
            'kota' => $this->faker->city,
            'provinsi' => $this->faker->state,
            'kode_pos' => $this->faker->postcode,
            'telepon' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'website' => $this->faker->domainName,
            'fasilitas' => json_encode([
                'igd' => $this->faker->boolean,
                'icu' => $this->faker->boolean,
                'rawat_inap' => $this->faker->boolean,
                'farmasi' => $this->faker->boolean,
            ]),
        ];
    }
}
