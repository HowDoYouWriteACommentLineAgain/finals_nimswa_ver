<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\roles>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $access_level = $this->faker->randomElement([1, 2, 3]);
        $name = function ($lvl){
            switch ($lvl){
                case 3:
                    'Admin';
                    break;
                case 2:
                    'Moderator';
                    break;
                default:
                case 1:
                    'Registered_user';
                    break;
            }
        };
        return [
            'role_name' => $name,
            'access_level' => $access_level,
        ];
    }
}
