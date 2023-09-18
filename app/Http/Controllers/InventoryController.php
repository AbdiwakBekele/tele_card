<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inventoryDashboard(){
        $today_consumption = 0;
        $thisMonth_consumption = 0;
        $chartData = [];
        $maxStock = 0;
        $total_stock = 0;

        $products=Product::all();
        foreach ($products as $product) {
            $chartData[] = $product->count_stock;
            $total_stock += $product->count_stock * intval($product->product_name);
            if($maxStock <= $product->count_stock){
                $maxStock = $product->count_stock;
            }
        }
                
        $today_sales = Sale::whereDate('created_at', today())->get();
        foreach($today_sales as $today_sale){
            $product_name = $today_sale->product->product_name;
            $today_consumption += intval($product_name);
        }

        $thisMonthSales = Sale::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->get();
        foreach($thisMonthSales as $thisMonthSale){
            $product_name = $thisMonthSale->product->product_name;
            $thisMonth_consumption += intval($product_name);
        }

        return view('stock.stockDashboard', compact('products', 'today_consumption', 'thisMonth_consumption', 'chartData', 'maxStock', 'total_stock'));
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