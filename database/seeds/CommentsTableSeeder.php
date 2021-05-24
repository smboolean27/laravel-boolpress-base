<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // 1. seleziono solo i posts pubblicati
        $posts = Post::where('published', 1)->get();
        // 2. ciclo sui posts
        foreach ($posts as $post) {
            // 3. ciclo n volte per creare i commenti
            for ($i = 0; $i < rand(0, 3); $i++) {

                $newComment = new Comment();
                $newComment->post_id = $post->id;
                // 4. in caso di colonna nullable
                if (rand(0,1)) {
                    $newComment->name = $faker->name();
                }
                $newComment->content = $faker->text();
                $newComment->save();
            }
            
        }
    }
}
