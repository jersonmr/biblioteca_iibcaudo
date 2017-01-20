<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function getList()
    {
        $areas = Area::all();

        return view('admin.areas.list', compact('areas'));
    }

    public function createArea()
    {
        return view('admin.areas.create');
    }

    /**
     * Guarda registro en BD
     * @return route
     */
    public function storeArea()
    {
    	$data = request()->all();
    	
    	Area::create($data);

    	return redirect()->route('areas');
    }

	/**
	 * Retorna el form de edicion de area
	 * @param  int $area_id clave primaria de la tabla areas
	 * @return [array] array con los datos del registro segun su id
	 */
    public function editArea($area_id)
    {
    	$area = Area::findOrFail($area_id);

    	return view('admin.areas.update', compact('area'));
    }

    public function updateArea($area_id)
    {
    	$data = request()->all();
    	dd($data); exit;

    	$area = Area::findOrFail($area_id);

    	$area->fill($data);

    	return redirect()->route('areas');
    }
}
