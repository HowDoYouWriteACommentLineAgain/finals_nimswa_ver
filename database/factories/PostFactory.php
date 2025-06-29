<?php

namespace Database\Factories;

use App\Status;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

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
        $response = Http::get('https://coffee.alexflipnote.dev/random.json');
        return [
        'title' => $this->faker->sentence(), 
        'content' => $this->faker->text(), 
        'image' => $response, 
        'published_date' => $this->faker->dateTime(), 
        'status' => $this->faker->randomElement(Status::cases()),
        ];
    }
}
