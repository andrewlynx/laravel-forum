<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function() {
                return UserFactory::new();
            },
            'category_id' => function() {
                return CategoryFactory::new();
            },
            'title' => fake()->sentence,
            'body'  => fake()->paragraph,
        ];
    }
}
