<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Area;
use App\Subarea;

class ItemController extends Controller
{
    public function getItems()
    {
    	$items = Item::all();

        return view('admin.items.list', compact('items'));
    }

    public function createItem()
    {
    	$areas = Area::orderBy('name')->pluck('name', 'area_id');
    	return view('admin.items.create', compact('areas'));
    }
}
