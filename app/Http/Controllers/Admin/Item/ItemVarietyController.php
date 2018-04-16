<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

use App\ItemVariety;

class ItemVarietyController extends Controller
{
    public function searchVarieties(Request $request)
    {
        $term = $request->get('term', '');
        
        $item_variety_names = ItemVariety::distinct()->where('name', 'LIKE', '%'.$term.'%')->whereNotNull('name')->pluck('name');
        
        foreach ($item_variety_names as $item_variety_name) {
            $data[] = ['value' => $item_variety_name,];
        }

        return $data;
    }
}
