<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\SaveRoomRequest;

class RoomController extends Controller
{
    /**
     * Menambahkan room baru.
     */
    public function index()
    {
        $rooms = Room::paginate(8);  // Ambil semua data room
        return view('rooms.room', compact('rooms'));  // Tampilkan di view
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'room_name' => 'required|string|max:255',
            'hotel_id' => 'required|exists:hotels,id', // Pastikan hotel_id valid dan ada di tabel hotels
        ]);

        // Menyimpan data room baru
        $room = new Room();
        $room->room_name = $request->room_name;
        $room->hotel_id = $request->hotel_id;
        $room->save();

    }

    public function create()
    {
        $hotels = Hotel::all();  // Ambil semua data hotel
        return view('rooms.create', compact('hotels'));  // Kirim data hotel ke view
    }

    public function show(Room $room){

        // $hotels = Hotel::where('id', $id)->get();
        // $hotels = Hotel::findOrFail(id: $id);
        // $hotels = Hotel::findOrFail(id: $id);

        return view('rooms.show', compact('room'));

    }

    public function edit(Room $room){

        // $hotels = Hotel::where('id', $id)->get();
        // $hotels = Hotel::findOrFail(id: $id);

        return view('rooms.edit', compact('room'));

    }

    public function update(SaveRoomRequest $request, Room $room){
        $room->update($request->validated());

        return redirect()->route('rooms.show', $room);
    }

    public function delete(Room $room){

        $room->delete();

        return redirect()->route('rooms')->with('status', 'room Deleted');

    }
}