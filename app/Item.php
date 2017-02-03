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

    public static function filterAndPaginate($title, $collection)
    {
        return Item::title($title)
            ->collection($collection)
            ->orderBy('item_id', 'ASC')
            ->paginate();
    }

    public function scopeTitle($query, $title)
    {
        if(trim($title) != "") {
            $query->where('title', "LIKE", "%$title%");
        }
    }

    public function scopeCollection($query, $collection)
    {
        if($collection != "") {
            $query->where('collection', $collection);
        }
    }
}
