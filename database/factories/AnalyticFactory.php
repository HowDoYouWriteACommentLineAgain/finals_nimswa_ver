<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Analytic>
 */
class AnalyticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $post = Post::inRandomOrder()->first();
        return [
            'post_id' => $post->id,
            'views' => $this->faker->numberBetween(0, 1000),
            'comments' => Comment::where('post_id', $post->id)->count(),
            'likes' => $this->faker->numberBetween(0, 800),
        ];
    }
}
