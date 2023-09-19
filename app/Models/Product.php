<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Inventory;
use App\Models\DailySale;
use App\Models\MonthlySale;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'count_stock',
        'count_delivered'
    ];

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function dailySales(){
        return $this->hasMany(DailySale::class);
    }

    public function monthlySales(){
        return $this->hasMany(MonthlySale::class);
    }
}