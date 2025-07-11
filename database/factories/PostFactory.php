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
        // $response = Http::get('https://coffee.alexflipnote.dev/random.json');
        return [
        'title' => $this->faker->sentence(), 
        'content' => $this->faker->text(), 
        // 'image' => $response, 
        'image' => 'https://coffee.alexflipnote.dev/IMk-3G2_fk8_coffee.jpg', //replace this with above for true random
        'published_date' => $this->faker->dateTime(), 
        'status' => $this->faker->randomElement(Status::cases()),
        ];
    }
}
