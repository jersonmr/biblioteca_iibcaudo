<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadeRoute;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        if($route_name == 'update-user')
        {       
            return [
                'dni' => [
                    'required',
                    'numeric',
                    Rule::unique('users')->ignore($this->route->getParameter('id'), 'user_id'),
                ],
                'treatment' => 'required',
                'name' => 'required',
                'last_name' => 'required',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore($this->route->getParameter('id'), 'user_id'),
                ],
                'role' => [
                    'required',
                    Rule::in(['investigator', 'editor'])
                ]
            ];                 
        }

        return [
            'dni' => 'required|numeric|unique:users,dni',
            'treatment' => 'required',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => [
                'required',
                Rule::in(['investigator', 'editor'])
            ]
        ];
    }
}
