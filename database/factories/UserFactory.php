<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_no' => $this->faker->phoneNumber,
            'group_id' => $this->faker->numberBetween(1,10),
            'sales_manager' => null, 
            'address' => $this->faker->address,
            'discount' => $this->faker->numberBetween(0, 100), // Example of generating a random discount value.
            'account_type' => $this->faker->randomElement(['Agent', 'Sub-agent', 'Staff']),
            'title' => $this->faker->jobTitle,
            'activation_pin' => $this->faker->numberBetween(1000, 9999), // Example of generating a random activation pin.
            'activation_status' => $this->faker->randomElement(['ACT_PENDING', 'ACTIVATED']),
            'account_status' => $this->faker->randomElement(['LOCKED', 'ACTIVE']),
            'license' => $this->faker->uuid,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}