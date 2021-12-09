<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RoomsController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:rooms',
            'avatar' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $file = $request->file('avatar');
        $fileName = time() . '_' . md5_file($file?->getRealPath()) . '.' . $file->getClientOriginalExtension();
        $file->storeAs(Config::get('params.rooms.avatarsDir'), $fileName, 'public');

        $room = new Room();
        $room->title = $validated['title'];
        $room->avatar = $fileName;
        $room->save();

        return redirect(route('home'));
    }
}
