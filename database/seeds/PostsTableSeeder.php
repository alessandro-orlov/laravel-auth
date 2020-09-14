<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
          $new_post = new Post();
          $new_post->title = $faker->sentence(4);
          $new_post->img_path = $faker->imageUrl();
          $new_post->content = $faker->text(600);
          $new_post->user_id = 1;
          $new_post->save();

        }
    }
}
