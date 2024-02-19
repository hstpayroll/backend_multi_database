<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'tin' => $this->faker->randomNumber(9),
            'logo' => $this->faker->imageUrl(),
            'website' => $this->faker->url,
            'currency_id' => $this->faker->numberBetween(1, 2), // Assuming 1-10 are valid currency IDs
            'calendar_id' => $this->faker->numberBetween(1, 2), // Assuming 1-5 are valid calendar IDs
            'description' => $this->faker->paragraph,
    ];
    }
}
