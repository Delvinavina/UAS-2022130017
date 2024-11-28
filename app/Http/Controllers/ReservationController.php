<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $search = $request->input('search');
    
        $query = Reservation::with(['user', 'room.hotel'])
            ->where('user_id', $userId);
    
        if ($search) {
            $query->where(function ($subQuery) use ($search) {
                $subQuery->whereHas('room.hotel', function ($query) use ($search) {
                    $query->where('hotel_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('room', function ($query) use ($search) {
                    $query->where('room_name', 'like', '%' . $search . '%');
                })
                ->orWhere('status', 'like', '%' . $search . '%');
            });
        }
    
        $reservations = $query->paginate(10);
    
        return view('reservations.index', compact('reservations', 'search'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,room_id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);
    
        $roomId = $validated['room_id'];
        $existingReservation = Reservation::where('room_id', $roomId)
            ->where('user_id', Auth::id())
            ->where('status', '!=', 'Finished')
            ->exists();
    
        if ($existingReservation) {
            return redirect()->back()->withErrors(['room_id' => 'You already have an active reservation for this room.']);
        }
        
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $roomId,
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'status' => 'Pending',
        ]);
    
        $room = $reservation->room;
        if ($room) {
            $room->update([
                'room_status' => 'full',
            ]);
        }
    
        return redirect()->route('reservations.index', $roomId)->with('success', 'Reservation successful!');
    }
    

    public function checkout(Reservation $reservation)
    {
        if ($reservation->user_id !== auth::id()) {
            return redirect()->route('reservations.index')->with('error', 'Unauthorized access.');
        }

        if ($reservation->status !== 'Confirmed') {
            return redirect()->route('reservations.index')->with('error', 'Please complete the payment before checkout.');
        }

        $reservation->update([
            'status' => 'Finished',
        ]);

        if ($reservation->room) {
            $reservation->room->update([
                'room_status' => 'available',
            ]);
        } else {
            return redirect()->route('reservations.index')->with('error', 'Room tidak ditemukan untuk reservasi ini.');
        }

        return redirect()->route('reservations.index')->with('success', 'Transaksi berhasil disimpan dan reservasi diperbarui.');
    }

}