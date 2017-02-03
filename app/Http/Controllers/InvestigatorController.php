<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestigatorController extends Controller
{
    public function getDashboard(Request $request)
    {        
        $items = Item::filterAndPaginate($request->get('title'), $request->get('collection'));

    	return view('investigator.dashboard', compact('items'));
    }

    public function itemDetail($item_id)
    {
    	$item = Item::findOrFail($item_id);

    	return view('investigator.item-detail', compact('item'));
    }

}
