<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'judul' => fake()->sentence,
            'nomor_surat' => fake()->unique()->numerify('###/UKK/2025'),
            // 'status' => fake()->randomElement(['draft', 'approved']),
            'file' => 'surat/dummy.pdf',
        ];
    }
}
