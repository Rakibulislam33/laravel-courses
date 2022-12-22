<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Review;
use App\Models\Series;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@r.com',
            'password' => bcrypt('123'),
            'type' => 1,
        ]);


        $serises = [

            [
                'name'=>"javascript",
                'image'=>"https://www.cloudways.com/blog/wp-content/uploads/best-php-frameworks-1.jpg",
            ],
            [
                'name'=>"Php",
                'image'=>"https://www.cloudways.com/blog/wp-content/uploads/best-php-frameworks-1.jpg",
            ],
            [
                'name'=>"Laravel",
                'image'=>"https://laravel-courses.com/storage/series/54e8baab-727e-4593-a78a-e0c22c569b61.png",
            ],
            [
                'name'=>"WordPress",
                'image'=>"https://www.cloudways.com/blog/wp-content/uploads/best-php-frameworks-1.jpg",
            ],
            [
                'name'=>"Vue",
                'image'=>"https://laravel-courses.com/storage/series/7d2e33b5-fcd0-4227-bce6-aa49b976bd7c.png",
            ],
        ];





        foreach ($serises as $item) {
            Series::create([
                'name' =>$item['name'],
                'image' =>$item['image'],
            ]);
        }


        $topics = ['Eloquent','validation','Refactoring','Testing','Authentication'];

         foreach ($topics as $item) {

            $slug = strtolower(str_replace(' ', '-', $item));
            Topic::create([
                'name' =>$item,
                'slug' =>$slug
            ]);
        }

        //create platform
        $platforms = ["Laracasts","Youtube","Laravel.io","Larajobs","Laravel News","Laracats Forum"];

        foreach ($platforms as $item) {
            Platform::create([
                'name' =>$item,
            ]);
        }

        //create author
        // $authors = ["Rakibul Islam","Rasel","Laravel"];

        // foreach ($authors as $item) {
        //     Author::create([
        //         'name' =>$item,
        //     ]);
        // }

        Author::factory(10)->create();



        //create 50 users
        User::factory(50)->create();

        //create 100 users
        Course::factory(100)->create();


        $courses = Course::all();

        foreach ($courses as $course) {
            $topics = Topic::all()->random(rand(1,5))->pluck('id')->toArray();
            $course->topics()->attach($topics);

            $authors = Author::all()->random(rand(1,3))->pluck('id')->toArray();
            $course->authors()->attach($authors);

            $series = Series::all()->random(rand(1,3))->pluck('id')->toArray();
            $course->series()->attach($series);

        }

        //creating review
        Review::factory(100)->create();



    }
}
