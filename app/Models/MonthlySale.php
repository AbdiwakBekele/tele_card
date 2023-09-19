<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class MonthlySale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'year_month',
        'amount'
    ];


    public function product(){
        return $this->belongsTo(Product::class);
    }
}