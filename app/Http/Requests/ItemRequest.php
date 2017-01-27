<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
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
        return [
            'title'      => 'required|unique:items,title', 
            'author'     => 'required',
            'abstract'   => 'required',
            'keywords'   => 'required',
            'collection' => 'required|in:libros,monografias,revistas,tesis',
            'pub_year'   => 'required|digits:4',
            'filename'   => 'required|file|mimes:pdf',
            //'user_id'    => 'required',
            'area_id'    => 'required',
            'subarea_id' => 'required'
        ];
    }
}
