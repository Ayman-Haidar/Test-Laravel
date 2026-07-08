<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'model' => $this->faker->year(),
            'details' => $this->faker->sentence(),

            // 'name'=> fake()->unique()->name(),
            // 'model'=> fake()->year(),
            // 'details'=> fake()->sentence(),
        ];
    }
}
