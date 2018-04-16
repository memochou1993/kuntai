<?php

use Illuminate\Database\Seeder;

class ItemTagsTableSeeder extends Seeder
{
    public function run()
    {
        $item_tags = factory(App\ItemTag::class, 100)->create();
    }
}
