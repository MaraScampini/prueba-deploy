<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\AssetsUser;
use App\Models\HistoricalBooking;

class BookingUpdated
{
    use Dispatchable, SerializesModels;

    public $assetsUser;

    /**
     * Create a new event instance.
     *
     * @param  AssetsUser  $assetsUser
     * @return void
     */
    public function __construct(AssetsUser $assetsUser)
    {
        $this->assetsUser = $assetsUser;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {

        $historicalBooking = new HistoricalBooking([
            'user_id' => $this->assetsUser->user_id,
            'asset_id' => $this->assetsUser->asset_id,
            'status' => $this->assetsUser->status,
            'start_date' => $this->assetsUser->start_date,
            'end_date' => $this->assetsUser->end_date,
            'deleted_at'=> $this->assetsUser->deleted_at
        ]);
        $historicalBooking->save();
    }
}