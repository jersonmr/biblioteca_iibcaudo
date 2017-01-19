<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class AreaController extends Controller
{
    public function getList()
    {
        $areas = Area::all();

        return view('admin.areas.list', compact('areas'));
    }

    public function createArea()
    {
        return view('admin.areas.create');
    }
}
