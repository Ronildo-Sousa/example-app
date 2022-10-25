<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Search>
 */
class SearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CEP' => fake()->numerify(),
            'city' => fake()->city(),
            'pulic_place' => fake()->sentence(2),
            'weather' => fake()->sentence(1),
            'temperature' => fake()->numerify(),
            'moisture' => fake()->numerify(),
            'air_speed' => fake()->numerify(),
            'ip_address' => fake()->ipv4()
        ];
    }
}
