<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Route;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'treatment', 'dni', 'name', 'last_name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullnameAttribute($value)
    {
        return $this->treatment." ".$this->name." ".$this->last_name;
    }

    public function setPasswordAttribute($value)
    {        
        $route_name = Route::currentRouteName();

        if($route_name == 'create-user') {
            $this->attributes['password'] = bcrypt(substr($value, -4));
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
