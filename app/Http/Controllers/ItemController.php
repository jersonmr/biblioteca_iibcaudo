<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Subarea;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getItems()
    {
    	$items = Item::orderBy('item_id', 'DESC')->paginate(30);

        return view('admin.items.list', compact('items'));
    }

    public function createItem()
    {
    	$areas = Area::orderBy('name')->pluck('name', 'area_id');
    	return view('admin.items.create', compact('areas'));
    }

    /**
     * Obtiene el listado de subareas dado el id del area 
     * @param  int $area_id id del area
     * @return array          Array(id, nombre) de las subareas correspondiente a un area
     */
    public function getSubareasByAjax($area_id)
    {
        $subareas = Subarea::where('area_id', $area_id)
                    ->select('subarea_id', 'name')
                    ->orderBy('name', 'ASC')
                    ->get()
                    ->toArray();

        array_unshift($subareas, ['subarea_id' => '', 'name' => 'Seleccione subarea']);

        return $subareas;
    }

    public function storeItem(ItemRequest $request)
    {
        
    }
}
