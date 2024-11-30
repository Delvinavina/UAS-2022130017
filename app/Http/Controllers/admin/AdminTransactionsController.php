<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class AdminTransactionsController extends Controller
{
    public function index()
    {
       
        $transactions = Transaction::with(['user', 'room'])->paginate(8);

        
        return view('admin.transactions.index', compact('transactions'));
    }
}