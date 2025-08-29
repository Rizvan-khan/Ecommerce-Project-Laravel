<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order_items;

class Order extends Model
{
     protected $fillable = [
        'user_id', 'subtotal', 'discount', 'tax', 'total',
        'payment_status', 'payment_method', 'payment_id'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
