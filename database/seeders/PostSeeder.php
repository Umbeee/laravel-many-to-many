<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Admin\Post;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0; $i<20; $i++){

            $new_post = new Post();
            $new_post->title = $faker->sentence(5);
            $new_post->content = $faker->text(400);
            $new_post->slug = Str::slug( $new_post->title, '-');
            $new_post->cover_image = $faker->imageUrl(640, 480, 'animals', true);
            $new_post->save();


        }
    }
}
