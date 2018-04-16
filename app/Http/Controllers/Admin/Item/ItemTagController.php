<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

use App\ItemTag;

class ItemTagController extends Controller
{
    public function searchTags(Request $request)
    {
        $term = $request->get('term', '');
        
        $item_tag_names = ItemTag::distinct()->where('name', 'LIKE', '%'.$term.'%')->whereNotNull('name')->pluck('name');
        
        foreach ($item_tag_names as $item_tag_name) {
            $data[] = ['value' => $item_tag_name,];
        }

        return $data;
    }
}
