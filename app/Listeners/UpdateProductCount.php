<?php

namespace App\Listeners;

use App\Events\InventoryCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductCount
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
    public function handle(InventoryCreated $event): void
    {
        $inventory = $event->inventory;
        $product = $inventory->product;
        $product->count_stock = $product->inventories->count();
        $product->save();
    }


}