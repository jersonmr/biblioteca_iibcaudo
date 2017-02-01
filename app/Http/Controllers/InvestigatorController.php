<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class InvestigatorController extends Controller
{
    public function getDashboard(Request $request)
    {        
        $items = Item::filterAndPaginate($request->get('title'), $request->get('collection'));

    	return view('investigator.dashboard', compact('items'));
    }
}
