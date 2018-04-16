<?php

namespace App\Http\Controllers\Front\Item;

use App\Http\Controllers\Front\Controller;
use Illuminate\Http\Request;

use App\Item;
use App\ItemTrack;

class ItemTrackController extends Controller
{
    public static function trackSearchHistory(Request $request)
    {
        $item_track_content = ItemTrack::where('type', 'Search History')->where('guest_token', $request->session()->get('_token'))->value('content');

        if ($item_track_content) {
            ItemTrack::where('type', 'Search History')->where('guest_token', $request->session()->get('_token'))->update(['content' => $item_track_content.'->'.$request->q,]);
        } else {
            ItemTrack::insert([
                'type' => 'Search History',
                'guest_token' => $request->session()->get('_token'),
                'content' => $request->q,
                'status' => 0,
            ]);
        }
    }

    public static function trackBrowsingHistory(Request $request, Item $item)
    {
        $item_track_content = ItemTrack::where('type', 'Browsing History')->where('guest_token', $request->session()->get('_token'))->value('content');

        if ($item_track_content) {
            ItemTrack::where('type', 'Browsing History')->where('guest_token', $request->session()->get('_token'))->update(['content' => $item_track_content.'->'.$item->id,]);
        } else {
            ItemTrack::insert([
                'type' => 'Browsing History',
                'guest_token' => $request->session()->get('_token'),
                'content' => $item->id,
                'status' => 0,
            ]);
        }
    }

    public static function countViews(Request $request, Item $item)
    {
        $item_track_content = ItemTrack::where('type', 'Browsing History')->where('guest_token', $request->session()->get('_token'))->value('content');
    
        if (in_array($item->id, explode('->', $item_track_content)) == false) Item::where('id', $item->id)->increment('views', 1);
    }
}
