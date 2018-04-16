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

        $item_regions = Item::selectRaw('`region` as name, count(`region`) as number')->whereNotNull('region')->groupBy('region')->get();

        foreach ($item_regions as $item_region) {
            $data[] = ['type' => 'Region', 'name' => $item_region->name, 'number' => $item_region->number,];
        }
        
        $item_makers = Item::selectRaw('`maker` as name, count(`maker`) as number')->whereNotNull('maker')->groupBy('maker')->get();

        foreach ($item_makers as $item_maker) {
            $data[] = ['type' => 'Maker', 'name' => $item_maker->name, 'number' => $item_maker->number,];
        }

        $item_brands = Item::selectRaw('`brand` as name, count(`brand`) as number')->whereNotNull('brand')->groupBy('brand')->get();

        foreach ($item_brands as $item_brand) {
            $data[] = ['type' => 'Brand', 'name' => $item_brand->name, 'number' => $item_brand->number,];
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
