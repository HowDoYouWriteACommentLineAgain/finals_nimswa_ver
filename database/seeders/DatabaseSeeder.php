<?php

namespace Database\Seeders;

use App\Models\Analytic;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['role_name' => 'Admin', 'access_level' => 3],
            ['role_name' => 'Moderator', 'access_level' => 2],
            ['role_name' => 'Registered_user', 'access_level' => 1],
        ];
        
        foreach($roles as $role){
            Role::firstOrCreate(
                ['role_name' => $role['role_name']],
                ['access_level' => $role['access_level']],
            );
        }

        User::factory(5)->create();
        Post::factory(5)->create();
        Analytic::factory(5)->create();
        Comment::factory(5)->create();
        Tag::factory(5)->create();
    }
}
