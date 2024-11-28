<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRoomRequest;

class RoomController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $room = new Room();
        $room->room_name = $request->room_name;
        $room->hotel_id = $request->hotel_id;
        $room->save();
    }

    public function show(Room $room){
        return view('rooms.show', compact('room'));
    }
}