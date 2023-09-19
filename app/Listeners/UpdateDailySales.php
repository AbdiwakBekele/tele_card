<?php

namespace App\Listeners;

use App\Events\DailySalesEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Sale;
use App\Models\DailySale;

class UpdateDailySales
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
    public function handle(DailySalesEvent $event): void
    {
        $sale = $event->sale;
        $product = $sale->product;
        $date = $sale->created_at->toDateString();

        // Calculating the total sales
        $totalSalesCount = Sale::whereDate('created_at', $date)->where('product_id', $product->id)->count();
        $totalSales = $totalSalesCount * intval($product->product_name);

        // Insert or update the daily_sales record
        $dailySale = DailySale::updateOrCreate(
            [
                'date' => $date,
                'product_id' => $product->id,
            ],
            ['amount' => $totalSales]
        );
    }
}