<?php

namespace Database\Seeders;

use App\Models\Analytic;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Container\Attributes\Database;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        DatabaseSeeder::seedRoles();
        User::factory(5)->create();
        Post::factory(20)->create();
        Comment::factory(5)->create();
        Tag::factory(5)->create();  
        //Analytic::factory(5)->create();
        DatabaseSeeder::seedAnaytics();
        DatabaseSeeder::assignPostRelationships();


    }

    public function seedRoles(): void
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
    }

    public function seedAnaytics(): void
    {
        $posts = Post::withCount(['comments'])->get();
        foreach($posts as $post){
            $max_view = rand(0, 100);
            Analytic::updateOrCreate(
                ['post_id' => $post->id],
                [
                    'views' => $max_view,
                    'comments' => $post->comments_count,
                    'likes' => rand(0,$max_view)
                ]
                );
        }
    }

    public function assignPostRelationships(): void
    {
        $users = User::all();
        $posts = Post::all();
        $tags = Tag::all();
        $max_tags = Tag::count();

        foreach($posts as $post)
        {
            $userIds = $users->random(rand(1,3))->pluck('id')->toArray();
            $author_role = 'Registered_user';
            $post_tags = $tags->random(rand(1, $max_tags/2));
            //Note to sef
                //pluck retrieves all values of key given
                //userIds is being given a random 1-3 people via random()
            $post->user()->syncWithoutDetaching($userIds);
                //just stacks that's waht withoutDetaching mean.
            
            $post->tags()->syncWithoutDetaching($post_tags);
        }
    }
}

