<?php

use Illuminate\Support\Facades\Route;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\Group;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('db_test', function(){
    $invs = Inventory::where('p_id', 5)->take(100000)->get();

    foreach($invs as $index => $inv){
        $inv->p_id = '2';
        $inv->save();
        echo $index."<br>";
    }
});

Route::get('count_inv', function(){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo "Response time: {$responseTime} milliseconds";
    
});

Route::get('count_inv_stock', function(){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::where('status', 'IN_STOCK')->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "IN_STOCK - Response time: {$responseTime} milliseconds";
    
});

Route::get('count_inv_delivered', function(){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::where('status', 'DELIVERED')->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "IN_STOCK - Response time: {$responseTime} milliseconds";
    
});

//***********************************/

Route::get('count_inv_delivered/{id}', function($id){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::where('status', 'DELIVERED')->where('p_id', $id)->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "DELIVERED - Response time: {$responseTime} milliseconds";
    
});

Route::get('count_inv_stock/{id}', function($id){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::where('status', 'IN_STOCK')->where('p_id', $id)->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "IN_STOCK - Response time: {$responseTime} milliseconds";
    
});

Route::get('count_inv/{id}', function($id){
    DB::enableQueryLog();

    // Run your query
    $count = Inventory::where('p_id', $id)->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "DELIVERED - Response time: {$responseTime} milliseconds";
    
});

Route::get('count_inv2/{id}', function($id){
    DB::enableQueryLog();

    // Run your query
    $count = InventoryPartitioned::where('p_id', $id)->count();

    // Get the executed queries
    $queries = DB::getQueryLog();

    // The last query in the log will be your SELECT COUNT(*) query
    $lastQuery = end($queries);

    // Extract the execution time from the query log
    $responseTime = $lastQuery['time'];

    // You can now use $responseTime to check the response time of your query
    echo $count."<br>";
    echo "DELIVERED - Response time: {$responseTime} milliseconds";
    
});

//***********************************/

Route::get('count_sales', function(){
    $count = Sale::where('retail_type', 'download')->first();

    if($count){
        echo "User_id: ". $count->retailer_id. "| Download_id: ". $count->download_id;
        echo "<br>";
        $download = Download::find($count->download_id);
        echo "User_id: ". $download->retailer_id;
    }else{
        echo "None Found";
    }
    
});

Route::get('/total_sales', function(){
    $totalPrice = Sale::join('users', 'sales.retailer_id', '=', 'users.id')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->join('inventories', 'sales.inv_id', '=', 'inventories.id')
            ->join('products', 'inventories.p_id', '=', 'products.id')
            ->where('users.group_id', '=', 33)
            ->sum('products.p_name');

        echo $totalPrice;
});

Route::get('sales_dates', function(){
    $sale = new Sale();
    $sale->product_name = 'Product A';
    $sale->amount = 100.50;
    $sale->created_at = '1993-01-15'; // Replace with the desired date

    // Save the record to the database
    $sale->save();

    
});


/**********************************************/

// Group Factory
Route::get('group_factory', function(){
    Group::factory()->times(10)->create();
});

Route::get('user_factory', function(){

    User::factory()->times(100)->create();
});

Route::get('product_factory', function(){
    Product::factory()->times(9)->create();
});

Route::get('inventory_factory', function(){
    Inventory::factory()->times(500)->create();
});

Route::get('inventory_factory', function(){
    Inventory::factory()->times(500)->create();
});

Route::get('sales_factory', function(){
    Sale::factory()->times(500)->create();
});


Route::get('/', function () {
    return view('dashboard');
});