<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

use App\ItemTrack;
use App\ItemAssociation;

class ItemAssociationController extends Controller
{
    public static function update()
    {
        $item_tracks = ItemTrack::where('type', 'Browsing History')->where('status', '0');

        foreach ($item_tracks->get() as $item_track) {
            $item_track_items =explode('->', $item_track->content);

            for ($i = 0; $i < count($item_track_items); $i++) {
                for ($j = 0; $j < count($item_track_items); $j++) {
                    $first_item = $item_track_items[$i];
                    $second_item = $item_track_items[$j];
                    $item_associations = ItemAssociation::where('first_item', $first_item)->where('second_item', $second_item);
                    
                    if ($first_item != $second_item) {
                        if ($item_associations->count() != 0) {
                            $item_associations->increment('degree', 1);
                        } else {
                            ItemAssociation::insert([
                                'first_item' => $first_item,
                                'second_item' => $second_item,
                                'degree' => 1,
                            ]);
                        }
                    }
                }
            }
        }

        $item_tracks->increment('status', 1);
    }
}
