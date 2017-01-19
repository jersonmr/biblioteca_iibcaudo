<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'treatment', 'dni', 'name', 'last_name', 'email', 'password', 'role',
    ];
}
