<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thread_id' => function() {
                return ThreadFactory::new();
            },
            'user_id' => function() {
                return UserFactory::new();
            },
            'body'  => fake()->paragraph,
        ];
    }
}
