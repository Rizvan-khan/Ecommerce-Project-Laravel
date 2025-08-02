<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
     protected $fillable = ['product_id', 'size'];

      public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
