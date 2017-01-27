<?php

namespace App\Http\Controllers;

use App\Area;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Subarea;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

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
        $item = new Item();

        // Obteniendo la coleccion
        $collection = $request->collection;

        // Rellenando los datos
        $item->fill($request->all());

        // Guardando el archivo en la carpeta correspondiente
        if ($request->hasFile('filename')) {
            if($request->file('filename')->isValid()){
                // Obteniendo el nombre del archivo
                $file = $request->file('filename')->getClientOriginalName();
                // Limpiando el nombre de archivo, eliminando caracteres extraños
                $filename = $this->sanitizeFilename($file);
                // Guardando el archivo
                $item->filename = $request->file('filename')->storeAs('public/uploads/'.$collection, $filename);    // Carpeta Storage
            }
        }

        // Guardando la data en la BD
        $item->save();

        return redirect()->route('items');
    }

    /**
     * @param $file
     * @return string
     */
    public function sanitizeFilename($file)
    {
        $filename = str_random(8)."-".str_slug(pathinfo($file, PATHINFO_FILENAME));
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $filename = $filename . "." . $extension;

        return $filename;
    }

    public function getFile($item_id)
    {
        $item = Item::findOrFail($item_id);

        $headers = [];

        return response()->download(
            storage_path('app/public/uploads/'.$item->collection.'/'.$item->filename),
            null,
            $headers,
            ResponseHeaderBag::DISPOSITION_INLINE
        );
    }
}
