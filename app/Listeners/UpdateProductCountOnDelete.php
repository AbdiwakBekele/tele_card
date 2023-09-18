<?php

namespace App\Listeners;

use App\Events\InventoryDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductCountOnDelete
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InventoryDeleted $event): void
    {
        $product = $event->product;
        $product->count_stock = $product->inventories->count();
        $product->save();
    }
}