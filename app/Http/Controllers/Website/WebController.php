<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Category;
use App\Models\Product;


class WebController extends Controller
{
    //
    public function AllCategory()
    {
       $all = Category::all(); // ya $all = Category::get();
    return view('index', compact('all'));
    }


public function getAllProducts()
{
    $products = Product::with(['colors', 'images', 'sizes'])->get();
     return view('index', compact('products'));
}


public function getproductdetail($id)
{
    
     $product = Product::with(['colors', 'images','sizes'])->findOrFail($id);
    $categories = Category::all();
    return view('product-detail', compact('product', 'categories'));
}


}
