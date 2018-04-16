<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\Controller;

use Intervention\Image\ImageManagerStatic as Image;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Gate;
use App\Item;
use App\ItemElement;
use App\ItemVariety;
use App\ItemTag;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $agent = new Agent();

        $items = Item::with('user');

        /* 聯集檢索 */
        $queries = explode(' ', trim($request->q));
        
        foreach($queries as $query) {
            if ($query) $items->orWhere('full_text', 'LIKE', '%'.$query.'%');
        };

        /* 交集檢索 */
        $narrowed_queries = explode(' ', trim($request->nq));
        
        foreach($narrowed_queries as $narrowed_query) {
            if ($narrowed_query) $items->where('full_text', 'LIKE', '%'.$narrowed_query.'%');
        };
        
        $items = $items->orderBy('id', 'desc')->paginate(10);
        
        return view('admin.items.index', [
            'agent' => $agent,
            'items' => $items->appends(request()->input()),
        ]);
    }

    public function showAddForm(Request $request)
    {
        $today = Carbon::now('Asia/Taipei');

        $item_first_genre_names = ItemElement::select('name')->where('item_elements.type', 'First Genre')->orderBy('item_elements.name', 'asc')->get();

        $item_second_genre_names = ItemElement::select('name')->where('item_elements.type', 'Second Genre')->orderBy('item_elements.name', 'asc')->get();

        $item_country_names = ItemElement::select('name')->where('item_elements.type', 'Country')->orderBy('item_elements.name', 'asc')->get();

        $item_first_unit_names = ItemElement::select('name')->where('item_elements.type', 'First Unit')->orderBy('item_elements.name', 'asc')->get();

        $item_second_unit_names = ItemElement::select('name')->where('item_elements.type', 'Second Unit')->orderBy('item_elements.name', 'asc')->get();

        return view('admin.items.add', [
            'today' => $today,
            'item_first_genre_names' => $item_first_genre_names,
            'item_second_genre_names' => $item_second_genre_names,
            'item_country_names' => $item_country_names,
            'item_first_unit_names' => $item_first_unit_names,
            'item_second_unit_names' => $item_second_unit_names,
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255|unique:items',
            'second_name' => 'max:255',
            'year' => 'nullable|digits:4',
            'first_genre' => 'max:255',
            'second_genre' => 'max:255',
            'country' => 'max:255',
            'region' => 'max:255',
            'maker' => 'max:255',
            'brand' => 'max:255',
            'capacity' => 'nullable|integer|digits_between:0, 4',
            'abv' => 'nullable|numeric|max:100',
            'price' => 'nullable|integer|digits_between:0, 5',
            'discount' => 'nullable|numeric|max:1',
            'first_unit' => 'max:255',
            'second_unit' => 'max:255',
            'barcode' => 'required|digits_between:0, 13|unique:items',
            'description' => '',
            'variety' => 'max:255',
            'tag' => 'max:255',
        ]);

        $full_text = '';
        foreach($request->except('_token') as $key => $value) {
            if ($value) $full_text .= $key.':'.$value.',';
        }
        
        $items = new Item;
        $items->first_name = $request->input('first_name');
        $items->second_name = $request->input('second_name');
        $items->year = $request->input('year');
        $items->first_genre = $request->input('first_genre');
        $items->second_genre = $request->input('second_genre');
        $items->country = $request->input('country');
        $items->region = $request->input('region');
        $items->maker = $request->input('maker');
        $items->brand = $request->input('brand');
        $items->capacity = $request->input('capacity');
        $items->abv = $request->input('abv');
        $items->price = $request->input('price');
        $items->discount = $request->input('discount');
        $items->first_unit = $request->input('first_unit');
        $items->second_unit = $request->input('second_unit');
        $items->barcode = $request->input('barcode');
        $items->description = $request->input('description');
        $items->full_text = $full_text;
        $items->user_id = Auth::user()->id;
        $items->save();

        if ($request->input('variety')) {
            foreach (explode(',', trim($request->input('variety'))) as $item_variety) {
                $data[] = ['name' => $item_variety, 'item_id' => $items->id,];
            }
    
            ItemVariety::insert($data);
        }

        if ($request->input('tag')) {
            foreach (explode(',', trim($request->input('tag'))) as $item_tag) {
                $data[] = ['name' => $item_tag, 'item_id' => $items->id,];
            }
    
            ItemTag::insert($data);
        }
        
        if ($request->hasFile('image_front')) {
            $image = Storage::putFileAs('public/images/item/front', $request->file('image_front'), $items->id.'.jpg');

            $image = Image::make('storage/app/public/images/item/front/'.$items->id.'.jpg')->resize(320, 800)->save('storage/app/public/images/item/front/'.$items->id.'_l.jpg');

            $image = Image::make('storage/app/public/images/item/front/'.$items->id.'.jpg')->resize(160, 400)->save('storage/app/public/images/item/front/'.$items->id.'_m.jpg');

            $image = Image::make('storage/app/public/images/item/front/'.$items->id.'.jpg')->resize(48, 120)->save('storage/app/public/images/item/front/'.$items->id.'_s.jpg');
        }
        
        if ($request->hasFile('image_back')) {
            $image = Storage::putFileAs('public/images/item/back', $request->file('image_back'), $items->id.'.jpg');

            $image = Image::make('storage/app/public/images/item/back/'.$items->id.'.jpg')->resize(320, 800)->save('storage/app/public/images/item/back/'.$items->id.'_l.jpg');

            $image = Image::make('storage/app/public/images/item/back/'.$items->id.'.jpg')->resize(160, 400)->save('storage/app/public/images/item/back/'.$items->id.'_m.jpg');

            $image = Image::make('storage/app/public/images/item/back/'.$items->id.'.jpg')->resize(48, 120)->save('storage/app/public/images/item/back/'.$items->id.'_s.jpg');
        }

        return redirect()->route('admin.items.view', $items->id);
    }

    public function view(Request $request, Item $item)
    {
        $previous_item_id = Item::where('id', '<', $item->id)->max('id');

        $next_item_id = Item::where('id', '>', $item->id)->min('id');

        $item_varieties = Item::find($item->id)->itemVariety()->orderBy('id', 'desc')->get();

        $item_tags = Item::find($item->id)->itemTag()->orderBy('id', 'desc')->get();

        return view('admin.items.view', [
            'item' => $item,
            'previous_item_id' => $previous_item_id,
            'next_item_id' => $next_item_id,
            'item_varieties' => $item_varieties,
            'item_tags' => $item_tags,
        ]);
    }

    public function showUpdateForm(Request $request, Item $item)
    {
        $today = Carbon::now('Asia/Taipei');

        $item_first_genre_names = ItemElement::select('name')->where('type', 'First Genre')->orderBy('name', 'asc')->get();

        $item_second_genre_names = ItemElement::select('name')->where('type', 'Second Genre')->orderBy('name', 'asc')->get();

        $item_country_names = ItemElement::select('name')->where('type', 'Country')->orderBy('name', 'asc')->get();

        $item_first_unit_names = ItemElement::select('name')->where('type', 'First Unit')->orderBy('name', 'asc')->get();

        $item_second_unit_names = ItemElement::select('name')->where('type', 'Second Unit')->orderBy('name', 'asc')->get();

        $item_variety_names = implode(',', Item::find($item->id)->itemVariety()->orderBy('id', 'desc')->pluck('name')->all());

        $item_tag_names = implode(',', Item::find($item->id)->itemTag()->orderBy('id', 'desc')->pluck('name')->all());

        return view('admin.items.update', [
            'item' => $item,
            'today' => $today,
            'item_first_genre_names' => $item_first_genre_names,
            'item_second_genre_names' => $item_second_genre_names,
            'item_country_names' => $item_country_names,
            'item_first_unit_names' => $item_first_unit_names,
            'item_second_unit_names' => $item_second_unit_names,
            'item_variety_names' => $item_variety_names,
            'item_tag_names' => $item_tag_names,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        Validator::make($request->all(), [
            'first_name' => [
                'required',
                'max:255',
                Rule::unique('items')->ignore($item->first_name, 'first_name'),
            ],
        ])->validate();

        $this->validate($request, [
            'second_name' => 'max:255',
            'year' => 'nullable|digits:4',
            'first_genre' => 'max:255',
            'second_genre' => 'max:255',
            'country' => 'max:255',
            'region' => 'max:255',
            'maker' => 'max:255',
            'brand' => 'max:255',
            'capacity' => 'nullable|integer|digits_between:0, 4',
            'abv' => 'nullable|numeric|max:100',
            'price' => 'nullable|integer|digits_between:0, 5',
            'discount' => 'nullable|numeric|max:1',
            'first_unit' => 'max:255',
            'second_unit' => 'max:255',
            'barcode' => 'required|digits_between:0, 13|unique:items,barcode,'.$item->id,
            'description' => '',
            'variety' => 'max:255',
            'tag' => 'max:255',
        ]);

        $full_text = '';
        foreach($request->except('_token') as $key => $value) {
            if ($value) $full_text .= $key.':'.$value.',';
        }

        $item->update([
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'year' => $request->input('year'),
            'first_genre' => $request->input('first_genre'),
            'second_genre' => $request->input('second_genre'),
            'country' => $request->input('country'),
            'region' => $request->input('region'),
            'maker' => $request->input('maker'),
            'brand' => $request->input('brand'),
            'capacity' => $request->input('capacity'),
            'abv' => $request->input('abv'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'first_unit' => $request->input('first_unit'),
            'second_unit' => $request->input('second_unit'),
            'barcode' => $request->input('barcode'),
            'description' => $request->input('description'),
            'full_text' => $full_text,
            'editor' => Auth::user()->name,
        ]);
    
        ItemVariety::where('item_id', $item->id)->delete();

        if ($request->input('variety')) {
            $data = [];

            foreach (explode(',', trim($request->input('variety'))) as $item_variety) {
                $data[] = ['name' => $item_variety, 'item_id' => $item->id,];
            }

            $item_varieties = ItemVariety::insert($data);
        }

        ItemTag::where('item_id', $item->id)->delete();
        
        if ($request->input('tag')) {
            $data = [];
            
            foreach (explode(',', trim($request->input('tag'))) as $item_tag) {
                $data[] = ['name' => $item_tag, 'item_id' => $item->id,];
            }

            $item_tags = ItemTag::insert($data);
        }
        
        if ($request->hasFile('image_front')) {
            $image = Storage::putFileAs('public/images/item/front', $request->file('image_front'), $item->id.'.jpg');
            $image = Image::make('storage/app/public/images/item/front/'.$item->id.'.jpg')->resize(320, 800)->save('storage/app/public/images/item/front/'.$item->id.'_l.jpg');
            $image = Image::make('storage/app/public/images/item/front/'.$item->id.'.jpg')->resize(160, 400)->save('storage/app/public/images/item/front/'.$item->id.'_m.jpg');
            $image = Image::make('storage/app/public/images/item/front/'.$item->id.'.jpg')->resize(48, 120)->save('storage/app/public/images/item/front/'.$item->id.'_s.jpg');
        } elseif ($request->input('abandoned_image_front')) {
            Storage::delete('public/images/item/front/'.$item->id.'.jpg');
            Storage::delete('public/images/item/front/'.$item->id.'_s.jpg');
            Storage::delete('public/images/item/front/'.$item->id.'_m.jpg');
            Storage::delete('public/images/item/front/'.$item->id.'_l.jpg');
        }
        
        if ($request->hasFile('image_back')) {
            $image = Storage::putFileAs('public/images/item/back', $request->file('image_back'), $item->id.'.jpg');
            $image = Image::make('storage/app/public/images/item/back/'.$item->id.'.jpg')->resize(320, 800)->save('storage/app/public/images/item/back/'.$item->id.'_l.jpg');
            $image = Image::make('storage/app/public/images/item/back/'.$item->id.'.jpg')->resize(160, 400)->save('storage/app/public/images/item/back/'.$item->id.'_m.jpg');
            $image = Image::make('storage/app/public/images/item/back/'.$item->id.'.jpg')->resize(48, 120)->save('storage/app/public/images/item/back/'.$item->id.'_s.jpg');
        } elseif ($request->input('abandoned_image_back')) {
            Storage::delete('public/images/item/back/'.$item->id.'.jpg');
            Storage::delete('public/images/item/back/'.$item->id.'_s.jpg');
            Storage::delete('public/images/item/back/'.$item->id.'_m.jpg');
            Storage::delete('public/images/item/back/'.$item->id.'_l.jpg');
        }
            
        return redirect()->route('admin.items.view', $item);
    }

    public function destroy(Request $request, Item $item)
    {
        if (Gate::allows('destroy', $item)) {
            $item_varieties = ItemVariety::where('item_id', $item->id)->delete();

            $item_tags = ItemTag::where('item_id', $item->id)->delete();
    
            $item->delete();
    
            return redirect()->route('admin.items.index');
        } else {
            abort(403);
        }
    }
}
