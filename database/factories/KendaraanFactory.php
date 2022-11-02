<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
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
            'harga' => $this->faker->numberBetween(50000000,500000000),
            'mesin' => $this->faker->numerify('Mesin ##'),
        ];
    }
}
