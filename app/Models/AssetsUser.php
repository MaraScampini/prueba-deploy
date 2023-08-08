<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsUser extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    
    public function historicalBookings()
{
    return $this->hasMany(HistoricalBooking::class, 'user_id', 'user_id');
}
}
