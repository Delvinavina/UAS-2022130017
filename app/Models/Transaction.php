<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reser_id',
        'total_price',
        'method'
    ];

    // Relasi ke Room
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    public function reservation()
    {
        return $this->belongsTo(Room::class, 'reser_id', 'reser_id');
    }
}