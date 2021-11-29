<?php

namespace App\Http\Controllers;

use App\Models\Room;

class IndexController extends Controller
{
    public function index()
    {
        return view('index/index', [
            'rooms' => Room::query()->orderBy('created_at', 'desc')->get()->all(),
        ]);
    }
}
