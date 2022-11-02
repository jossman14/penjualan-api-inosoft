<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // 'tahun_keluaran', 'warna', 'harga', 'mesin', 'tipe_suspensi', 'tipe_transmisi', 'kapasitas_penumpang', 'tipe_mobil', 'type', 'stok', 'penjualan'
        return [
            'tahun_keluaran' => $this->faker->numberBetween(1950,2022),
            'stok' => $this->faker->numberBetween(100,2000),
            'penjualan' => $this->faker->numberBetween(2,99),
            'warna' => $this->faker->colorName(),
            'harga' => $this->faker->numberBetween(50000000,500000000),
            'mesin' => $this->faker->numerify('Mesin ##'),
            'kapasitas_penumpang' => $this->faker->numberBetween(2,10),
            'tipe_mobil' => $this->faker->numerify('Tipe ##'),
        ];
    }
}
