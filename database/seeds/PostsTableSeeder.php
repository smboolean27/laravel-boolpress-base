<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {

            $newPost = new Post();
            $newPost->title = $faker->sentence();
            $newPost->date = $faker->date(); 
            $newPost->content = $faker->text();
            $newPost->image = $faker->imageUrl(640, 480, 'animals', true);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->published = rand(0, 1);
            $newPost->save();
        }
    }
}
