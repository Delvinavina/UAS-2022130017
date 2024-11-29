<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'room_name', 'hotel_id', 'room_price', 'room_status', 'image',
    ];

    // Primary key
    protected $primaryKey = 'room_id';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }

    public function reservations()
{
    return $this->hasMany(Reservation::class);
}
}