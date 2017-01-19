<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'area_id';

    protected $fillable = [
        'name', 'description', 'observations',
    ];
}
