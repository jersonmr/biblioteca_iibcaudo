<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function getAreas()
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

    /**
     * Actualiza el registro en BD correspondiente a la data traido desde el form de edicion
     * @param  int $area_id clave primaria de la tabla areas
     * @return view
     */
    public function updateArea($area_id)
    {
    	$area = Area::findOrFail($area_id);
    	
    	$data = request()->all();    	

    	$area->fill($data)->save();

    	return redirect()->route('areas');
    }

    public function deleteArea($area_id)
    {
    	$area = Area::findOrFail($area_id);

    	$area->delete();

    	return redirect()->back();
    }
}
