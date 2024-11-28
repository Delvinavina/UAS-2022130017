<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Requests\SaveHotelRequest;

class HotelController extends Controller
{
    public function hotel(Request $request)
    {

        
        $keyword = $request->input('search');

        $hotels = Hotel::when($keyword, function ($query, $keyword) {
            $query->where('hotel_name', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $hotels->appends(['search' => $keyword]);

        return view('hotels.hotel', compact('hotels', 'keyword'));
    }

    public function show(Hotel $hotel){

        $hotel = Hotel::with(['rooms' => function ($query) {
            $query->where('room_status', 'available');
        }])->findOrFail($hotel->id);

        return view('hotels.show', compact('hotel'));

    }
}