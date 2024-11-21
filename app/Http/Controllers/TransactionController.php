<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('room')->where('user_id', Auth::id())->get();

        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'room_id' => 'required|exists:rooms,room_id',
        'check_in_date' => 'required|date|after_or_equal:today',
        'check_out_date' => 'required|date|after:check_in_date',
    ]);


    $roomId = $validated['room_id'];
    $existingTransaction = Transaction::where('room_id', $roomId)
        ->where('user_id', auth::id())
        ->where('status', '!=', 'CheckedOut') 
        ->exists();

    if ($existingTransaction) {
        return redirect()->back()->withErrors(['room_id' => 'You already have an active reservation for this room.']);
    }


    $room = Room::findOrFail($roomId);
    $totalDays = (new \DateTime($validated['check_in_date']))->diff(new \DateTime($validated['check_out_date']))->days;
    $totalPrice = $room->price * $totalDays;


    Transaction::create([
        'user_id' => Auth::id(),
        'room_id' => $roomId,
        'check_in_date' => $validated['check_in_date'],
        'check_out_date' => $validated['check_out_date'],
        'total_price' => $totalPrice,
        'status' => 'Pending',
    ]);

    return redirect()->route('rooms.show', $roomId)->with('success', 'Reservation successful!');
}

public function checkout(Transaction $transaction)
{

    if ($transaction->user_id !== auth::id()) {
        return redirect()->route('transactions.index')->with('error', 'Unauthorized access.');
    }


    if ($transaction->payment_status !== 'Paid') {
        return redirect()->route('transactions.index')->with('error', 'Please complete the payment before checkout.');
    }


    $transaction->update(['status' => 'Checked Out']);

    return redirect()->route('transactions.index')->with('success', 'Checkout successful!');
}

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        $transaction->update([
            'status' => $request->status,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function pay(Transaction $transaction)
{

    if ($transaction->user_id !== auth::id()) {
        return redirect()->route('transactions.index')->with('error', 'Unauthorized access.');
    }


    $transaction->update(['payment_status' => 'Paid']);

    return redirect()->route('transactions.index')->with('success', 'Payment successful!');
}
}