<?php

use Illuminate\Database\Seeder;

class ItemVarietiesTableSeeder extends Seeder
{
    public function run()
    {
        $item_tags = factory(App\ItemVariety::class, 100)->create();
    }
}
