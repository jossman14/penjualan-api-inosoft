<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MotorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->numberBetween(1950,2022),
            'stok' => $this->faker->numberBetween(100,2000),
            'penjualan' => $this->faker->numberBetween(2,99),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->numberBetween(5000000,50000000),
            'mesin' => $this->faker->numerify('Mesin ##'),
            'tipe_suspensi' => $this->faker->numerify('Tipe Suspensi ##'),
            'tipe_transmisi' => $this->faker->numerify('Tipe Transmisi ##'),
        ];
    }
}
