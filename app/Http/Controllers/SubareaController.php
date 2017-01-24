<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subarea;
use App\Area;

class SubareaController extends Controller
{
    public function getSubareas()
    {
        $subareas = Subarea::all();

        return view('admin.subareas.list', compact('subareas'));
    }

    public function createSubarea()
    {
    	// Obteniendo el listado de areas
    	$areas = Area::orderBy('name')->pluck('name', 'area_id');
        return view('admin.subareas.create', compact('areas'));
    }

    /**
     * Guarda registro en BD
     * @return route
     */
    public function storeSubarea()
    {
    	$data = request()->all();
    	
    	Subarea::create($data);

    	return redirect()->route('subareas');
    }

	/**
	 * Retorna el form de edicion de area
	 * @param  int $subarea_id clave primaria de la tabla subareas
	 * @return [array] array con los datos del registro segun su id
	 */
    public function editSubarea($subarea_id)
    {
    	$subarea = Subarea::findOrFail($subarea_id);

    	return view('admin.subareas.update', compact('subarea'));
    }

    /**
     * Actualiza el registro en BD correspondiente a la data traido desde el form de edicion
     * @param  int $subarea_id clave primaria de la tabla subareas
     * @return view
     */
    public function updateSubarea($subarea_id)
    {
    	$subarea = Subarea::findOrFail($subarea_id);
    	
    	$data = request()->all();    	

    	$subarea->fill($data)->save();

    	return redirect()->route('subareas');
    }

    /**
     * Elimina una subarea de la BD
     * @param  int $subarea_id clave primaria de la tabla subareas
     * @return [void]             [Returna al listado de subareas]
     */
    public function deleteSubarea($subarea_id)
    {
    	$subarea = Subarea::findOrFail($subarea_id);

    	$subarea->delete();

    	return redirect()->back();
    }
}
