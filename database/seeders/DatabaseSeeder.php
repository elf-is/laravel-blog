<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Post::factory(5)->create();
        //      Only needed if we don't refresh the database
//        User::truncate();
//        Post::truncate();
//        Category::truncate();
//        $user = User::factory(1)->create();
//
//        $family = Category::create([
//            'name' => 'Family',
//            'slug' => 'family'
//        ]);
//        $personal = Category::create([
//            'name' => 'Personal',
//            'slug' => 'personal'
//        ]);
//        $work = Category::create([
//            'name' => 'Work',
//            'slug' => 'work'
//        ]);
//        Post::create([
//            'category_id' => $family->id,
//            'user_id' => $user->first()->id,
//            'title' => 'Family Post',
//            'slug' => 'my-family-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,labore et dolore magna aliqua.',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
//        ]);
//
//        Post::create([
//            'category_id' => $work->id,
//            'user_id' => $user->first()->id,
//            'title' => 'Work Post',
//            'slug' => 'my-work-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,labore et dolore magna aliqua.',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
//        ]);
//
//        Post::create([
//            'category_id' => $personal->id,
//            'user_id' => $user->first()->id,
//            'title' => 'Personal Post',
//            'slug' => 'my-personal-post',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,labore et dolore magna aliqua.',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
//            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
//            ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
//            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
//             deserunt mollit anim id est laborum.',
//        ]);
    }
}
