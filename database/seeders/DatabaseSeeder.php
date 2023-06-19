<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Position;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create();
        $tags = Tag::factory(30)->create();
        $posts = Post::factory(200)->create();
        Position::create(
            [
                'title' => 'Автомеханик',
                'salary' => 15,
            ]
        );
        User::create(
            [
                'name' => 'Админ',
                'surname' => 'Админ',
                'position_id' => 1,
                'email' => 'adminadmin@mail.ru',
                'password' => Hash::make('adminadmin111'), // password
                'role' => 'admin'
            ]
        );

        foreach ($posts as $post){
            $tagsId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
