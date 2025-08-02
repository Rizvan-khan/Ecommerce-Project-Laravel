<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'image','quantity','price','dp_price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function colors()
    {
        return $this->hasMany(Color::class);
    }

     public function sizes()
    {
        return $this->hasMany(Size::class);
    }

     public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

     public function promos()
    {
        return $this->hasMany(Promo::class);
    }
}
