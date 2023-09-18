<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->numberBetween(1, 100),
            'product_id'=>$this->faker->numberBetween(1, 9),
            'serial_no'=>$this->faker->numberBetween(1000, 9999),
            'activation_no'=>$this->faker->numberBetween(1000, 9999),
            'exp_date'=>$this->faker->dateTimeBetween('now', '+5 years'),
            'batch_no'=>$this->faker->numberBetween(1000, 9999),
            'retail_type' =>$this->faker->randomElement(['Print', 'download', 'Topup']),
            'phone_no'=>$this->faker->phoneNumber(),
            'download_id'=>null,
            'recept_status'=> $this->faker->randomElement(['Active', 'Pending']),
            'month'=>$this->faker->numberBetween(1,12) 
        ];
    }
}