<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'shopping_cart_id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function total(){
        return round(($this->quantity * $this->product->discountedPrice), 2);
        
    }
}
