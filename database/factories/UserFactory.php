<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'username' => fake()->username(),
            'password' => fake()->password(),
            'address' => fake()->sentence(),
            'type' => fake()->randomDigit(),
            'parent_id' => fake()->randomNumber(4, false),
            'verified_at' => null,
            'closed' => false,
            'code' => fake()->unique()->randomNumber(5, false),
            'social_type' => fake()->randomDigit(),
            'social_id' => fake()->unique()->numerify('############'),
            'social_name' => fake()->name(),
            'social_nickname' => fake()->word(),
            'social_avatar' => fake()->word(),
            'description' => fake()->sentence(),
        ];
    }
}
