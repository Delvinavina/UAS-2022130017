<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class TransactionController extends Controller
{
    public function index(Reservation $reservation)
    {
        $reservation->load('room');
        $payment_methods = PaymentMethod::all();

        return view('transactions.index', [
            'reservation' => $reservation,
            'payment_methods' => $payment_methods,
        ]);
    }

    public function store(Request $request, Reservation $reservation)
    {
        $request->validate([
            'method' => 'required|string',
            'reser_id' => 'required|exists:reservations,id',
            'room_price' => 'required|numeric',
        ]);
        
        $transaction = new Transaction();
        $transaction->reser_id = $request->reser_id;
        $transaction->method = $request->method;
        $transaction->total_price = $request->room_price;
        $transaction->save();

        $reservation = Reservation::findOrFail($request->reser_id);

        $reservation->update([
            'status' => 'Confirmed',
        ]);

        if ($reservation->room) {
            $reservation->room->update([
                'status' => 'full',
            ]);
        } else {
            return redirect()->route('reservations.index')->with('error', 'Room tidak ditemukan untuk reservasi ini.');
        }

        return redirect()->route('reservations.index')->with('success', 'Transaksi berhasil disimpan dan reservasi diperbarui.');
    }
}