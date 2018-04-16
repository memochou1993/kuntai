<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ItemElementsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ItemTagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ItemVarietiesTableSeeder::class);
    }
}
