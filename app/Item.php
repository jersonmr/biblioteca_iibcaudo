<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    protected $fillable = [
        'title', 'author', 'abstract', 'keywords', 'editorial', 'collection', 'isbn', 'issn', 'pages', 'volume', 'pub_year', 'filename', 'user_id', 'area_id', 'subarea_id'
    ];
}
