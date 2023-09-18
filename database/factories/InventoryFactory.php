<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => $this->faker->numberBetween(1,9),
            'serial_no'=> $this->faker->numberBetween(1000, 9999),
            'activation_no'=> $this->faker->numberBetween(1000, 9999),
            'batch_no' => $this->faker->numberBetween(1000, 9999),
            'exp_date' => $this->faker->dateTimeBetween('now', '+5 years')
        ];
    }
}