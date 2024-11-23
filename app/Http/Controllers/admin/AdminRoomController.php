<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveRoomRequest;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class AdminRoomController extends Controller
{
    public function index()
    {

        return view('admin.rooms.index', [
            'rooms' => Room::with('hotel')->paginate(8),
        ]);
    }

    public function create(){
        $hotels = Hotel::all();
        return view('admin.rooms.create', compact('hotels'));
    }

    public function edit(Room $room)
    {
        $hotels = Hotel::all();
        return view('admin.rooms.edit', compact('room', 'hotels'));
    }

    public function store(Request $request){

        $request->validate([
            'room_name' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $room = new Room();
        $room->room_name = $request->room_name;
        $room->hotel_id = $request->hotel_id;
        $room->save();

        return redirect()->route('admin.rooms');
    }
    
    public function update(Request $request, Room $room)
    {

        $request->validate([
            'room_name' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
        ]);
    
        $room->update([
            'room_name' => $request->input('room_name'),
            'hotel_id' => $request->input('hotel_id'), 
        ]);
    
        return redirect()->route('admin.rooms', ['room' => $room->room_id])
                         ->with('success', 'Room updated successfully!');
    }     
    
}