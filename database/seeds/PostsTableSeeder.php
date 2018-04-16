<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $posts = factory(App\Post::class, 20)->create();
    }
}
