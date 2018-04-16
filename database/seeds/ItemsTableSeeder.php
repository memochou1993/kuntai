<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $items = factory(App\Item::class, 300)->create();
    }
}
