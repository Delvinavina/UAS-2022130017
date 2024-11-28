<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Requests\SaveHotelRequest;
use Illuminate\Support\Facades\Storage;

class AdminHotelController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        $hotels = Hotel::when($keyword, function ($query, $keyword) {
            $query->where('hotel_name', 'LIKE', "%{$keyword}%");
        })->paginate(8);

        $hotels->appends(['search' => $keyword]);

        return view('admin.hotels.index', compact('hotels', 'keyword'));
    }

    public function create(){
        return view('admin.hotels.create');
    }
    
    public function store(SaveHotelRequest $request)
    {
        $validatedData = $request->validated(); 

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hotels', 'public');
            $validatedData['image'] = $imagePath;
        }

        Hotel::create($validatedData);

        return redirect()->route('admin.hotels')->with('success', 'Hotel Created successfully!');
    }

    public function edit(Hotel $hotel){

        return view('admin.hotels.edit', compact('hotel'));

    }

    public function update(SaveHotelRequest $request, Hotel $hotel)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            if ($hotel->image) {
                Storage::disk('public')->delete($hotel->image);
            }
    
            $imagePath = $request->file('image')->store('hotels', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $hotel->update($validatedData);
    
        return redirect()->route('admin.hotels')->with('success', 'hotel updated successfully!');
    }
    

    public function delete(Hotel $hotel){

        $hotel->delete();

        return redirect()->route('admin.hotels')->with('status', 'Hotel Deleted');

    }
}