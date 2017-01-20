<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subarea extends Model
{
    protected $table = 'subareas';
    protected $primaryKey = 'subarea_id';

    protected $fillable = [
        'name', 'description', 'observations', 'area_id',
    ];
}
