<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\admin\AdminHotelController;
use App\Http\Controllers\admin\AdminGuestController;
use App\Http\Controllers\admin\AdminRoomController;
use App\Http\Controllers\admin\AdminReservationsController;
use App\Http\Controllers\admin\AdminTransactionsController;
use Illuminate\Support\Facades\Auth;

// Route Auth
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware Auth
Route::middleware(['auth'])->group(function () {

    // Rute Admin (admin dashboard)
    Route::prefix('admin')->middleware('role:admin')->group(function() {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        
        // Admin Hotel
        Route::get('/hotel', [AdminHotelController::class, 'index'])->name('admin.hotels');
        Route::get('/hotel/create', [AdminHotelController::class, 'create'])->name('admin.hotels.create');
        Route::post('/hotel/store', [AdminHotelController::class, 'store'])->name('admin.hotels.store');
        Route::get('/hotel/{hotel}/edit', [AdminHotelController::class, 'edit'])->name('admin.hotels.edit');
        Route::patch('/hotel/{hotel}', [AdminHotelController::class, 'update'])->name('admin.hotels.update');
        Route::delete('/hotel/{hotel}', [AdminHotelController::class, 'delete'])->name('admin.hotels.delete');
        
        // Admin Guest
        Route::get('/guests', [AdminGuestController::class, 'index'])->name('admin.guests');
        Route::delete('/guest/{user}', [AdminGuestController::class, 'delete'])->name('admin.guests.delete');
        Route::get('/guest/{user}/edit', [AdminGuestController::class, 'edit'])->name('admin.guests.edit');
        Route::patch('/guest/{user}', [AdminGuestController::class, 'update'])->name('admin.guests.update');
        
        // Admin Room
        Route::get('/room', [AdminRoomController::class, 'index'])->name('admin.rooms');
        Route::get('/room/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
        Route::post('/room/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
        Route::get('/room/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
        Route::patch('/room/{room}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
        Route::delete('/room/{room}', [AdminRoomController::class, 'delete'])->name('admin.rooms.delete');
        
        Route::get('/reservations', [AdminReservationsController::class, 'index'])->name('admin.reservations');
        Route::get('/transactions', [AdminTransactionsController::class, 'index'])->name('admin.transactions');
    });

    // Rute User (user dashboard)
    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', function () {
            return view('index');
        })->name('home');
    });

    // Rute Hotel
    Route::get('/hotel', [HotelController::class, 'hotel'])->name('hotels');
    Route::get('hotel/{hotel}', [HotelController::class, 'show'])->name('hotel.show');

    // Rute Room
    Route::get('room/{room}', [RoomController::class, 'show'])->name('rooms.show');

    // Rute Transaction
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::post('reservations/{reservation}/checkout', [ReservationController::class, 'checkout'])->name('reservations.checkout');

    // Rute Transaction
    Route::post('transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('transactions/{reservation}', [TransactionController::class, 'index'])->name('transactions.index');
    Route::put('transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::post('transactions/{transaction}/checkout', [TransactionController::class, 'checkout'])->name('transactions.checkout');
    Route::post('transactions/{transaction}/pay', [TransactionController::class, 'pay'])->name('transactions.pay');
});