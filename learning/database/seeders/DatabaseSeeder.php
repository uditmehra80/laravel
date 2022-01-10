<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

          Post::factory(5)->create();



//        $user = User::factory()->create();

//       $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);

//       $family = Category::create([
//         'name' => 'Family',
//         'slug' => 'family'
//     ]);

//    $work = Category::create([
//         'name' => 'Work',
//         'slug' => 'work'
//     ]);

    
//     Post::create([
//         'user_id' => $user->id,
//         'category_id' => $family->id,
//         'title' => 'My Family Post',
//         'slug' => 'my-first-post',
//         'excerpt' => 'excerpt is the one of etc tec',
//         'body' => 'body nhey theer are some bodu hjdbe these'
//     ]);

//     Post::create([
//         'user_id' => $user->id,
//         'category_id' => $work->id,
//         'title' => 'My work Post',
//         'slug' => 'my-second-post',
//         'excerpt' => 'excerpt is the one of etc tec',
//         'body' => 'body nhey theer are some bodu hjdbe these'
//     ]);
//     Post::create([
//         'user_id' => $user->id,
//         'category_id' => $personal->id,
//         'title' => 'My personal Post',
//         'slug' => 'my-third-post',
//         'excerpt' => 'excerpt is the one of etc tec',
//         'body' => 'body nhey theer are some bodu hjdbe these'
//     ]);

    }
}
