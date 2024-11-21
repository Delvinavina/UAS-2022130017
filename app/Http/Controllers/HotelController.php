<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Requests\SaveHotelRequest;

class HotelController extends Controller
{
    public function hotel(){

        return view('hotels.hotel', [
            'hotels' => Hotel::paginate(8)
        ]);
    }

    public function create(){
        return view('hotels.create');
    }

    public function store(SaveHotelRequest $request){


        Hotel::create($request->validated());
        return redirect()->route('hotels');
    }

    public function show(Hotel $hotel){


        $hotel->load('rooms');

        return view('hotels.show', compact('hotel'));

    }

    public function edit(Hotel $hotel){

        return view('hotels.edit', compact('hotel'));

    }

    public function update(SaveHotelRequest $request, Hotel $hotel){
        $hotel->update($request->validated());

        return redirect()->route('hotel.show', $hotel);
    }

    public function delete(Hotel $hotel){

        $hotel->delete();

        return redirect()->route('hotels')->with('status', 'Hotel Deleted');

    }
}