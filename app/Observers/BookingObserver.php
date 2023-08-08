<?php

namespace App\Observers;

use App\Events\BookingUpdated;
use App\Models\AssetsUser;

class BookingObserver
{
    /**
     * Handle the AssetsUser  "created" event.
     */
    public function created(AssetsUser $assetsUser)
    {
        event(new BookingUpdated($assetsUser));
    }

    /**
     * Handle the AssetsUser  "updated" event.
     */
    public function updated(AssetsUser $assetsUser)
    {
        //
    }

    /**
     * Handle the AssetsUser  "deleted" event.
     */
    public function deleted(AssetsUser $assetsUser)
    {
        //
    }

    /**
     * Handle the AssetsUser  "restored" event.
     */
    public function restored(AssetsUser $assetsUser)
    {
        //
    }

    /**
     * Handle the AssetsUser  "force deleted" event.
     */
    public function forceDeleted(AssetsUser $AssetsUser): void
    {
        //
    }
}
