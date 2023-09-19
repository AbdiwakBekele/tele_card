<?php

namespace App\Listeners;

use App\Events\MonthlySalesEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\MonthlySale;
use App\Models\Sale;

class UpdateMonthlySales
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
    public function handle(MonthlySalesEvent $event): void
    {
        $sale = $event->sale;
        $product = $sale->product;
        $year_month = $sale->created_at->format('Y-m');

        // Calculating the total sales
        $totalSalesCount = Sale::whereYear('created_at', $sale->created_at->year)
                                ->whereMonth('created_at', $sale->created_at->month)
                                ->where('product_id', $product->id)->count();
        $totalSales = $totalSalesCount * intval($product->product_name);

        // Insert or update the daily_sales record
        $dailySale = MonthlySale::updateOrCreate(
            [
                'year_month' => $year_month,
                'product_id' => $product->id,
            ],
            ['amount' => $totalSales]
        );
    }
}