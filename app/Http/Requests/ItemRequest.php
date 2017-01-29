<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadeRoute;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {      
        $route_name = FacadeRoute::currentRouteName();  
        
        // Si el llamado viene de la actualizacion de item
        if($route_name == 'update-item')
        {                        
            return [
                'title' => [
                    'required',
                    Rule::unique('items')->ignore($this->route->getParameter('id'), 'item_id') 
                ],
                'author'     => 'required',
                'abstract'   => 'required',
                'keywords'   => 'required',
                'collection' => 'required|in:libros,monografias,revistas,tesis',
                'pub_year'   => 'required|digits:4',
                'filename'   => 'file|mimes:pdf',
                'user_id'    => 'required',
                'area_id'    => 'required',
                'subarea_id' => 'required'
            ];
        }

        return [
            'title'      => 'required|unique:items,title', 
            'author'     => 'required',
            'abstract'   => 'required',
            'keywords'   => 'required',
            'collection' => 'required|in:libros,monografias,revistas,tesis',
            'pub_year'   => 'required|digits:4',
            'filename'   => 'required|file|mimes:pdf',
            'user_id'    => 'required',
            'area_id'    => 'required',
            'subarea_id' => 'required'
        ];
    }
}
