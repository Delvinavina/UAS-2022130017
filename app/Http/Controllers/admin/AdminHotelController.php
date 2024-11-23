<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Http\Requests\SaveHotelRequest;

class AdminHotelController extends Controller
{
    public function index()
    {

        return view('admin.hotels.index', [
            'hotels' => Hotel::paginate(8)
        ]);
    }

    public function create(){
        return view('admin.hotels.create');
    }
    
    public function store(SaveHotelRequest $request){
        Hotel::create($request->validated());
        return redirect()->route('admin.hotels');
    }

    public function edit(Hotel $hotel){

        return view('admin.hotels.edit', compact('hotel'));

    }

    public function update(SaveHotelRequest $request, Hotel $hotel){
        $hotel->update($request->validated());

        return redirect()->route('admin.hotels', $hotel);
    }

    public function delete(Hotel $hotel){

        $hotel->delete();

        return redirect()->route('admin.hotels')->with('status', 'Hotel Deleted');

    }
}