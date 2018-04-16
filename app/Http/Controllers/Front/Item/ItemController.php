<?php

namespace App\Http\Controllers\Front\Item;

use App\Http\Controllers\Front\Controller;
use App\Http\Controllers\Front\Item\ItemTrackController;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use DB;
use App\Item;
use App\ItemVariety;
use App\ItemTag;
use App\ItemCatalog;
use App\ItemElement;
use App\ItemAssociation;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        /* 使用者裝置資訊 */
        $agent = new Agent();

        /* 分類 */
        $item_catalogs = ItemCatalog::get();

        /* 熱門檢索詞 */
        $item_element_keywords = ItemElement::where('type', 'Keyword')->orderBy('order', 'asc')->pluck('name');
        
        /* 酒款一覽 */
        $item_sources = Item::with('user');

        /* 聯集檢索 */
        $item_sources->where(function ($query) use($request) {
            foreach(array_filter(explode(' ', $request->q)) as $q) {
                $query->orWhere('full_text', 'LIKE', '%'.$q.'%');
            };
        });

        /* 交集檢索 */
        $item_sources->where(function ($query) use($request) {
            foreach(array_filter(explode(',', $request->nq)) as $nq) {
                $query->where('full_text', 'LIKE', '%'.$nq.'%');
            };
        });

        /* 年分檢索 */
        if ($request->year) {
            $year_ranges = explode(' ~ ', $request->year);
            if ($year_ranges[0] < 1981) abort(404);
            if ($year_ranges[1] > Carbon::now('Asia/Taipei')->year + (10 - Carbon::now('Asia/Taipei')->year % 10)) abort(404);
            if ($year_ranges[0] > $year_ranges[1]) abort(404);
            $item_sources->whereBetween('year', [$year_ranges[0], $year_ranges[1]]);
        }

        /* 價格檢索 */
        if ($request->price) {
            $price_ranges = explode(' ~ ', str_replace('NTD$ ', '', str_replace(',', '', $request->price)));
            if ($price_ranges[0] < 0) abort(404);
            if ($price_ranges[1] > 5000) abort(404);
            if ($price_ranges[0] > $price_ranges[1]) abort(404);
            $item_sources->whereBetween('price', [$price_ranges[0], $price_ranges[1]]);
        }

        /* 檢索結果數量 */
        $items = clone $item_sources;
        $item_counts = $items->count();

        /* 排序與顯示筆數 */
        $order = ($request->order == 'price' or $request->order == 'year') ? $request->order : 'id';
        $dir = ($request->dir == 'asc' or $request->dir == 'desc') ? $request->dir : 'asc';
        $limit = ($request->limit == 8 or $request->limit == 12 or $request->limit == 16) ? $request->limit : 12;

        /* 檢索結果 */
        $items = clone $item_sources;
        $items = $items->orderBy($order, $dir)->paginate($limit);

        /* 後分類：國家 */
        $item_countries = clone $item_sources;
        $item_countries = $item_countries->selectRaw('`country` as name, count(`country`) as number')->whereNotNull('country')->groupBy('country')->get();

        /* 後分類：產地 */
        $item_regions = clone $item_sources;
        $item_regions = $item_regions->selectRaw('`region` as name, count(`region`) as number')->whereNotNull('region')->groupBy('region')->get();

        /* 後分類：酒廠 */
        $item_makers = clone $item_sources;
        $item_makers = $item_makers->selectRaw('`maker` as name, count(`maker`) as number')->whereNotNull('maker')->groupBy('maker')->get();

        /* 後分類：品牌 */
        $item_brands = clone $item_sources;
        $item_brands = $item_brands->selectRaw('`brand` as name, count(`brand`) as number')->whereNotNull('brand')->groupBy('brand')->get();

        /* 後分類：年分 */
        $item_years = clone $item_sources;
        $item_years = $item_years->selectRaw('(((`year` - 1) DIV 5) * 5 + 1) as name, count(`year`) as number')->whereNotNull('year')->groupBy('name')->get();

        /* 後分類：價格 */
        $item_prices = clone $item_sources;
        $item_prices = $item_prices->selectRaw('(((`price` - 1) DIV 500) * 500 + 1) as name, count(`price`) as number')->whereNotNull('price')->groupBy('name')->get();

        /* 暢銷排行榜 */
        $item_bestsellers = ItemElement::where('type', 'Bestseller')->where('order', '!=', 0)->orderBy('order', 'asc')->limit(3)->pluck('name');
        $item_bestseller_ordered = '\''.implode('\', \'', $item_bestsellers->all()).'\'';
        if ($item_bestseller_ordered) {
            $item_bestseller_items = Item::whereIn('first_name', $item_bestsellers)->orderByRaw("FIELD(first_name, $item_bestseller_ordered)")->get();
        } else {
            $item_bestseller_items = Item::whereIn('first_name', $item_bestsellers)->get();
        }
        
        /* 追蹤檢索紀錄 */
        if ($request->q) ItemTrackController::trackSearchHistory($request);

        return view('front.items.index', [
            'request' => $request,
            'agent' => $agent,
            'item_catalogs' => $item_catalogs,
            'item_element_keywords' => $item_element_keywords,
            'item_countries' => $item_countries,
            'item_regions' => $item_regions,
            'item_makers' => $item_makers,
            'item_brands' => $item_brands,
            'item_years' => $item_years,
            'item_prices' => $item_prices,
            'item_bestseller_items' => $item_bestseller_items,
            'item_counts' => $item_counts,
            'items' => $items->appends(request()->input()),
        ]);
    }

    public function view(Request $request, Item $item)
    {
        /* 分類 */
        $item_catalogs = ItemCatalog::get();

        /* 熱門檢索詞 */
        $item_element_keywords = ItemElement::where('type', 'Keyword')->pluck('name');

        /* 品種 */
        $item_varieties = Item::find($item->id)->itemVariety()->orderBy('id', 'desc')->get();

        /* 標記 */
        $item_tags = Item::find($item->id)->itemTag()->orderBy('id', 'desc')->get();

        /* 協同過濾 */
        $item_associations = ItemAssociation::where('first_item', $item->id)->orderBy('degree', 'desc')->limit(2)->pluck('second_item');
        $item_association_ordered = '\''.implode('\', \'', $item_associations->all()).'\'';
        if ($item_association_ordered) {
            $item_association_items = Item::whereIn('id', $item_associations)->orderByRaw("FIELD(id, $item_association_ordered)")->get();
        } else {
            $item_association_items = Item::whereIn('id', $item_associations)->get();
        }

        /* 精選酒款 */
        $item_specialities = ItemElement::where('type', 'Speciality')->where('order', '!=', 0)->inRandomOrder()->limit(1)->pluck('name');
        $item_speciality_ordered = '\''.implode('\', \'', $item_specialities->all()).'\'';
        if ($item_speciality_ordered) {
            $item_speciality_items = Item::whereIn('first_name', $item_specialities)->orderByRaw("FIELD(first_name, $item_speciality_ordered)")->get();
        } else {
            $item_speciality_items = Item::whereIn('first_name', $item_specialities)->get();
        }

        /* 前一筆資料 */
        $previous_item_id = Item::where('id', '<', $item->id)->max('id');

        /* 後一筆資料 */
        $next_item_id = Item::where('id', '>', $item->id)->min('id');

        /* 統計點閱次數 */
        ItemTrackController::countViews($request, $item);
        
        /* 追蹤瀏覽紀錄 */
        ItemTrackController::trackBrowsingHistory($request, $item);

        return view('front.items.view', [
            'request' => $request,
            'item_catalogs' => $item_catalogs,
            'item_element_keywords' => $item_element_keywords,
            'item_varieties' => $item_varieties,
            'item_tags' => $item_tags,
            'item_association_items' => $item_association_items,
            'item_speciality_items' => $item_speciality_items,
            'item' => $item,
            'previous_item_id' => $previous_item_id,
            'next_item_id' => $next_item_id,
        ]);
    }

    public function filter(Request $request)
    {
        /* 聯集檢索 */
        $queries = explode(' ', trim($request->q));
        foreach($queries as $key => $value){
            if ($value == $request->abandoned_q) unset($queries[$key]);
        }
        $queries = implode(' ', $queries);
        $q = 'q='.urlencode($queries);

        /* 交集檢索 */
        $narrowed_queries = explode(',', trim($request->nq));
        foreach($narrowed_queries as $key => $value){
            if ($value == $request->abandoned_nq) unset($narrowed_queries[$key]);
        }
        $narrowed_queries = implode(',', $narrowed_queries);
        $nq = '&nq='.urlencode($narrowed_queries);

        /* 年分檢索 */
        $year = ($request->year == $request->abandoned_year) ? '' : '&year='.$request->year;

        /* 價格檢索 */
        $price = ($request->price == $request->abandoned_price) ? '' : '&price='.$request->price;

        /* 排序與顯示筆數 */
        $order = ($request->order == 'year' or $request->order == 'price') ? '&order='.$request->order : '';
        $dir = ($request->dir == 'asc' or $request->dir == 'desc') ? '&dir='.$request->dir : '';
        $limit = ($request->limit == 8 or $request->limit == 12 or $request->limit == 16) ? '&limit='.$request->limit : '';

        return redirect('items?'.$q.$nq.$year.$price.$order.$dir.$limit);
    }
}
