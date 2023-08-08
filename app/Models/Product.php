<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function historicalProducts()
    {
        return $this->hasMany(HistoricalProduct::class, 'product_id','product_id');
    }

    public function provider()
    {
        return $this->belongsToMany(Provider::class, 'ProductsProvider', 'product_id', 'provider_id');     
    }
}
