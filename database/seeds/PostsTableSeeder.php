<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $title = 'Post ' . ($i + 1);
            $newPost = new Post();
            $newPost->title = $title;
            $newPost->content = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam accusamus aliquam totam magni quisquam delectus iure in maxime, ex debitis architecto incidunt dolor nemo suscipit nobis autem non? Magni perferendis iste a reiciendis dolorum ducimus totam excepturi aperiam doloribus maiores.';
            $newPost->slug = Str::slug($title ,'-');
            $newPost->save();
        }
    }
}
