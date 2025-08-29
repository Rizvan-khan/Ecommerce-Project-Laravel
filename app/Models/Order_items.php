<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price', 'color', 'size'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
