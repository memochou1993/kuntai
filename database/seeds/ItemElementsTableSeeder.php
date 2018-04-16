<?php

use Illuminate\Database\Seeder;

class ItemElementsTableSeeder extends Seeder
{
    public function run()
    {
        App\ItemElement::insert([
            ['type' => 'First Genre', 'name' => '葡萄酒',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Second Genre', 'name' => '紅酒',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Country', 'name' => 'Italy',],
            ['type' => 'Country', 'name' => 'Spain',],
            ['type' => 'Country', 'name' => 'France',],
            ['type' => 'Country', 'name' => 'United States',],
            ['type' => 'Country', 'name' => 'Argentina',],
            ['type' => 'Country', 'name' => 'Chile',],
            ['type' => 'Country', 'name' => 'Australia',],
            ['type' => 'Country', 'name' => 'South Africa',],
            ['type' => 'Country', 'name' => 'Germany',],
            ['type' => 'Country', 'name' => 'Portugal',],
            ['type' => 'Country', 'name' => 'Romania',],
            ['type' => 'Country', 'name' => 'Greece',],
            ['type' => 'Country', 'name' => 'Russia',],
            ['type' => 'Country', 'name' => 'New Zealand',],
            ['type' => 'Country', 'name' => 'Brazil',],
            ['type' => 'Country', 'name' => 'Hungary',],
            ['type' => 'Country', 'name' => 'Austria',],
            ['type' => 'Country', 'name' => 'Serbia',],
            ['type' => 'Country', 'name' => 'Moldova',],
            ['type' => 'Country', 'name' => 'Bulgaria',],
            ['type' => 'Country', 'name' => 'Georgia',],
            ['type' => 'Country', 'name' => 'Switzerland',],
            ['type' => 'Country', 'name' => 'Ukraine',],
            ['type' => 'Country', 'name' => 'Japan',],
        ]);

        App\ItemElement::insert([
            ['type' => 'First Unit', 'name' => '瓶',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Second Unit', 'name' => '打',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Keyword', 'name' => '熱門檢索詞',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Bestseller', 'name' => '暢銷排行榜',],
        ]);

        App\ItemElement::insert([
            ['type' => 'Speciality', 'name' => '精選酒款',],
        ]);
    }
}
