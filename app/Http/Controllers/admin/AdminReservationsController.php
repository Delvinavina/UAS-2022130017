<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function index(Request $request)
    {
        
        $keyword = $request->input('search');
    
        
        $reservations = Reservation::with(['user', 'room'])
            ->when($keyword, function ($query, $keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', "%{$keyword}%");
                })->orWhereHas('room', function ($q) use ($keyword) {
                    $q->where('room_name', 'LIKE', "%{$keyword}%");
                });
            })
            ->paginate(8);
    
        
        $reservations->appends(['search' => $keyword]);
    

        return view('admin.reservations.index', compact('reservations', 'keyword'));
    }
    
}