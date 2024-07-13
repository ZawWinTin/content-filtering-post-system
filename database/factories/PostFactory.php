<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::user()->inRandomOrder()->first();
        $date = now()->subDay(rand(1, 20));

        return [
            'content' => fake()->realText(),
            'user_id' => $user->id,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
