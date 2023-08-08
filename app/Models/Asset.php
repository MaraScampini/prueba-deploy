<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'image'
    ];

    public function user()
        {
            return $this->belongsToMany(User::class, 'bookings', 'asset_id', 'user_id')
                        ->withPivot('status', 'start_date', 'end_date');
        }
    }
