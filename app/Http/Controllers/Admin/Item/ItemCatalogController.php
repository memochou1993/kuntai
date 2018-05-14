<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

use App\Item;
use App\ItemVariety;
use App\ItemTag;
use App\ItemCatalog;

class ItemCatalogController extends Controller
{
    public static function refresh()
    {
        ItemCatalog::truncate();

        $item_countries = Item::selectRaw('`country` as name, count(`country`) as number')->whereNotNull('country')->groupBy('country')->get();

        foreach ($item_countries as $item_country) {
            $data[] = ['type' => 'Country', 'name' => $item_country->name, 'number' => $item_country->number,];
        }

        $item_years = Item::selectRaw('(((`year` - 1) DIV 5) * 5 + 1) as name, count(`year`) as number')->whereNotNull('year')->groupBy('name')->get();

        foreach ($item_years as $item_year) {
            $data[] = ['type' => 'Year', 'name' => ($item_year->name).' ~ '.($item_year->name + 4), 'number' => $item_year->number,];
        }

        $item_prices = Item::selectRaw('(((`price` - 1) DIV 500) * 500 + 1) as name, count(`price`) as number')->whereNotNull('price')->groupBy('name')->get();

        foreach ($item_prices as $item_price) {
            $data[] = ['type' => 'Price', 'name' => (number_format($item_price->name)).' ~ '.(number_format($item_price->name + 499)), 'number' => $item_price->number,];
        }

        $item_varieties = ItemVariety::selectRaw('`name` as name, count(`name`) as number')->groupBy('name')->get();

        foreach ($item_varieties as $item_variety) {
            $data[] = ['type' => 'Variety', 'name' => $item_variety->name, 'number' => $item_variety->number,];
        }

        $item_tags = ItemTag::selectRaw('`name` as name, count(`name`) as number')->groupBy('name')->get();

        foreach ($item_tags as $item_tag) {
            $data[] = ['type' => 'Tag', 'name' => $item_tag->name, 'number' => $item_tag->number,];
        }

        ItemCatalog::insert($data);
    }
}
