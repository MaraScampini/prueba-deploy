<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use App\Models\HistoricalProduct;

class ProductUpdated
{
    use Dispatchable, SerializesModels;

    public $product;
    /**
     * Create a new event instance.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        $historicalProduct = new HistoricalProduct([
            'name' => $this->product->name,
            'type' => $this->product->type,
            'price' => $this->product->price,
            'amount' => $this->product->amount,
        ]);
        $historicalProduct->save();
    }
}
