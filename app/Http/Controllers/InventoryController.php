<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use App\Models\DailySale;
use App\Models\MonthlySale;
use Carbon\Carbon;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inventoryDashboard(){
        $today_consumption = 0;
        $thisMonth_consumption = 0;
        $chartStockData = [];
        $chartTodaySalesData = [];
        $maxStock = 0;
        $maxTodaySales = 0;
        $total_stock = 0;

        // Each Product Available Stock
        $products=Product::all();
        foreach ($products as $product) {
            $chartStockData[] = $product->count_stock;
            $dailySaleProduct = $product->dailySales->where('date', now()->toDateString())->first();

            if ($dailySaleProduct) {
                $chartTodaySalesData[] = $dailySaleProduct->amount;
            } else {
                $chartTodaySalesData[] = 0; // Or handle it in some other way
            }

            $total_stock += $product->count_stock * intval($product->product_name);
            if($maxStock <= $product->count_stock){
                $maxStock = $product->count_stock;
            }
        }
        
        // Today Sales
        $today_sales = array_sum($chartTodaySalesData);
        $maxTodaySales = max($chartTodaySalesData);

        // This Month Sales
        $currentYearMonth = Carbon::now()->format('Y-m');
        $thisMonth_sales = MonthlySale::where('year_month', $currentYearMonth)->sum('amount');

        return view('stock.stockDashboard', compact('products', 'today_sales', 'thisMonth_sales', 'chartStockData', 'maxStock', 'chartTodaySalesData', 'maxTodaySales', 'total_stock'));
    }


    public function index(){
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}