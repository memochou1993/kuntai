<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Item\ItemCatalogController;
use App\Http\Controllers\Admin\Item\ItemAssociationController;
use Illuminate\Http\Request;

use App\Item;

class HomeController extends Controller
{
    public function __construct()
    {
        $item_counts = Item::count();

        if ($item_counts > 0) {
            ItemCatalogController::refresh();
    
            ItemAssociationController::update();
        }

        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.home');
    }
}
