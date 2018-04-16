<?php

namespace App\Http\Controllers\Admin\Item;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Admin\Controller;

use Jenssegers\Agent\Agent;
use App\Item;
use App\ItemElement;

class ItemElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $agent = new Agent();

        $item_elements = ItemElement::where('type', 'LIKE', $request->type)->orderBy('type', 'asc')->orderBy('name', 'asc')->paginate(10);

        return view('admin.itemElements.index', [
            'agent' => $agent,
            'item_elements' => $item_elements->appends(request()->input()),
        ]);
    }

    public function showAddForm(Request $request)
    {
        $item_element_types = ItemElement::select('type')->distinct()->get();

        return view('admin.itemElements.add', [
            'item_element_types'=>$item_element_types,
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'order' => 'integer',
        ]);

        $item_elements = new ItemElement;
        $item_elements->type = $request->input('type');
        $item_elements->name = $request->input('name');
        $item_elements->order = $request->input('order');
        $item_elements->save();

        return redirect()->route('admin.itemElements.view', $item_elements->id);
    }

    public function view(Request $request, ItemElement $item_element)
    {
        $previous_item_element_id = ItemElement::where('type', $item_element->type)->where('id', '<', $item_element->id)->max('id');

        $next_item_element_id = ItemElement::where('type', $item_element->type)->where('id', '>', $item_element->id)->min('id');

        return view('admin.itemElements.view', [
            'item_element' => $item_element,
            'previous_item_element_id' => $previous_item_element_id,
            'next_item_element_id' => $next_item_element_id,
        ]);
    }

    public function showUpdateForm(Request $request, ItemElement $item_element)
    {
        $item_element_types = ItemElement::select('type')->distinct()->get();

        return view('admin.itemElements.update', [
            'item_element_types' => $item_element_types,
            'item_element' => $item_element,
        ]);
    }

    public function update(Request $request, ItemElement $item_element)
    {
        $this->validate($request, [
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'order' => 'integer',
        ]);

        $item_element->update([
            'type' => $request->input('type'),
            'name' => $request->input('name'),
            'order' => $request->input('order'),
        ]);
            
        return redirect()->route('admin.itemElements.view', $item_element);
    }

    public function destroy(Request $request, ItemElement $item_element)
    {
        $item_element->delete();

        return redirect()->route('admin.itemElements.index');
    }

    public function searchRegions(Request $request)
    {
        $term = $request->get('term', '');
        
        $item_regions = Item::distinct()->where('region', 'LIKE', '%'.$term.'%')->whereNotNull('region')->orderBy('region', 'asc')->pluck('region');
        
        foreach ($item_regions as $item_region) {
            $data[] = ['value' => $item_region,];
        }

        return $data;
    }

    public function searchMakers(Request $request)
    {
        $term = $request->get('term', '');
        
        $item_makers = Item::distinct()->where('maker', 'LIKE', '%'.$term.'%')->whereNotNull('maker')->orderBy('maker', 'asc')->pluck('maker');
        
        foreach ($item_makers as $item_maker) {
            $data[] = ['value' => $item_maker,];
        }

        return $data;
    }

    public function searchBrands(Request $request)
    {
        $term = $request->get('term', '');
        
        $item_brands = Item::distinct()->where('brand', 'LIKE', '%'.$term.'%')->whereNotNull('brand')->orderBy('brand', 'asc')->pluck('brand');
        
        foreach ($item_brands as $item_brand) {
            $data[] = ['value' => $item_brand,];
        }

        return $data;
    }
}
