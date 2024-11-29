<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $rooms = Room::when($keyword, function ($query, $keyword) {
            $query->where('room_name', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $rooms->appends(['search' => $keyword]);

        return view('admin.rooms.index', compact('rooms', 'keyword'));
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

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $room = new Room();
        $room->room_name = $request->room_name;
        $room->room_price = $request->room_price;
        $room->hotel_id = $request->hotel_id;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $room->image = $imagePath; 
        }
    
        $room->save();
    
        return redirect()->route('admin.rooms')->with('success', 'Room created successfully');
    }
    
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'room_price' => 'required|numeric',
            'hotel_id' => 'required|exists:hotels,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $validatedData = [
            'room_name' => $request->input('room_name'),
            'room_price' => $request->input('room_price'),
            'hotel_id' => $request->input('hotel_id'), 
            'image' => $request->input('image'), 
        ];
    
        if ($request->hasFile('image')) {
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
    
            $imagePath = $request->file('image')->store('rooms', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $room->update($validatedData);
    
        return redirect()->route('admin.rooms', ['room' => $room->room_id])
                         ->with('success', 'Room updated successfully!');
    }
    
}