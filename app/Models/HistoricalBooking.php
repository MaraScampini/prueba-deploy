<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalBooking extends Model
{
    use HasFactory;
   
    public function booking()
    
    {
        return $this->belongsTo(AssetsUser::class, 'user_id', 'user_id');
    }
}
