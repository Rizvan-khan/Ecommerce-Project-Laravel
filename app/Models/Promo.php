<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['product_id', 'promo_code','promo_price'];

      public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
