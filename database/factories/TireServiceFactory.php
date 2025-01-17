<?php

namespace Database\Factories;

use App\Models\TireService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TireService>
 */
class TireServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'image' => $this->noImage(),
            'rooms_count' => $this->faker->numberBetween(1, 13),
            'floor' => $this->faker->numberBetween(1, 10),
            'area' => $this->faker->randomFloat(2, 30, 200),
            'description' => $this->faker->paragraph
        ];
    }

    public function noImage()
    {
        return $this->faker->boolean(24) ? null : $this->faker->imageUrl();
    }
}
