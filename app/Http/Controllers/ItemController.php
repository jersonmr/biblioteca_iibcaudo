<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Area;
use App\Item;
use App\Subarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ItemController extends Controller
{
    public function getItems()
    {
    	$items = Item::orderBy('item_id', 'DESC')->paginate(30);

        return view('admin.items.list', compact('items'));
    }

    /**
     * Retorna la vista de creacion de item
     * @return view Form de creacion de item
     */
    public function createItem()
    {
    	$areas = Area::orderBy('name')->pluck('name', 'area_id');
    	return view('admin.items.create', compact('areas'));
    }

    public function storeItem(ItemRequest $request)
    {
        $item = new Item();

        $data = $request->all(); 

        $data['filename'] = $this->saveUploadedFile($request);        

        // Guardando la data en la BD
        $item->fill($data)->save();

        return redirect()->route('items');
    }

    /**
     * Retorna la vista de creacion de item
     * @return view Form de creacion de item
     */
    public function editItem($item_id)
    {
        $item = Item::findOrFail($item_id);        
        $areas = Area::orderBy('name')->pluck('name', 'area_id');
        $subareas = Subarea::orderBy('name')->pluck('name', 'subarea_id');

        return view('admin.items.edit', compact('item', 'areas', 'subareas'));
    }

    public function updateItem(ItemRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);             

        $data = $request->all();                     

        // Guardando el archivo en la carpeta correspondiente (Si trae uno)
        if($request->filename) {
            //$item->filename = contiene el archivo previamente guardado
            $data['filename'] = $this->saveUploadedFile($request, $item->filename); 
        }

        $item->fill($data)->save();

        return redirect()->route('items');        
        
    }

    public function deleteItem($item_id, Request $request)
    {        
        $item = Item::findOrFail($item_id);   

        $item->delete();

        // Borrando el archivo 
        Storage::delete($item->filename);

        $message = 'El registro #' . $item->item_id . ' fue eliminado exitosamente';

        if ($request->ajax()) {
            return response()->json(['message' => $message]);
        }

        return back();
    }

    public function saveUploadedFile($request, $oldfile = null)
    {
        if ($request->hasFile('filename')) {
            if($request->file('filename')->isValid()) {

                if ($oldfile != '') {                    
                    // Borrando el archivo que se encontraba guardado
                    Storage::delete($oldfile);
                }

                // Obteniendo el nombre de la coleccion
                $collection = $request->collection;
                // Obteniendo el archivo
                $file = $request->file('filename');
                // Limpiando el nombre de archivo, eliminando caracteres extraños
                $filename = $this->sanitizeFilename($file->getClientOriginalName());                 
                // Guardando el archivo
                $filename = $file->storeAs('files/'.$collection, $filename);    // Carpeta Storage          

                return $filename;      
            }
        }      
        return false;  
    }

    /**
     * Limpia el nombre del archivo antes de guardarlo en la Base de Datos
     * @param $file Cadena con el nombre del archivo
     * @return string
     */
    public function sanitizeFilename($file)
    {
        $filename = time()."_".str_slug(pathinfo($file, PATHINFO_FILENAME));
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $filename = $filename . "." . $extension;

        return $filename;
    }

    /**
     * Obtienes el archivo guardado
     * @param  [int] $item_id 
     * @return response          Archivo a descargar
     */
    public function getFile($item_id)
    {
        $item = Item::findOrFail($item_id);

        $headers = [];
       
        return response()->file(
            storage_path('app/'.$item->filename),            
            $headers            
        );
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

}
