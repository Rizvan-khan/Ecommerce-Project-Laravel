<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
class ProductController extends Controller
{
   public function Product(){
    return view('admin.product.add-product');
   }

 public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'quantity' => 'required|numeric',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'colors' => 'required|array',
      //   'colors.*.name' => 'required|string',
        'colors.*.color_code' => 'required|string',
        'sizes' => 'required|array',
        'sizes.*' => 'required|string',
        'images.*' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
        'image' => 'image|mimes:jpg,png,jpeg,gif|max:2000',
        'dp_price' =>'required|numeric',
        'promo_code' =>'nullable|string',
        'promo_price' =>'required|numeric',

    ]);


     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/singleProduct'), $imageName);
    }


    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
         'quantity' => $request->quantity,
          'dp_price' => $request->dp_price,
           'image' => $imageName,
        'description' => $request->description,
        'category_id' => $request->category_id,
    ]);

    // Save Colors
    foreach ($request->colors as $color) {
        $product->colors()->create([
            // 'name' => $color['name'],
            'color_code' => $color['color_code'],
        ]);
    }

    $product->promos()->create([
    'promo_code' => $request->promo_code,
    'promo_price' => $request->promo_price
    ]);
    // Save Sizes
    foreach ($request->sizes as $size) {
        // $product->sizes()->create(['name' => $size]);
        $product->sizes()->create(['size' => $size]);

    }

    // Save Images
   if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $path = $image->store('uploads/products', 'public');
        $product->images()->create(['product_image' => $path]); // ✅ correct key
    }
}
return redirect()->route('admin.product.all-product')->with('success', 'Product added successfully!');


    // return redirect()->back()->with('success', 'Product added successfully!');
}

public function all(){

 $product = Product::with(['images', 'colors', 'sizes'])->get();


    return view('admin.product.all-product',compact('product'));
}

// public function edit($id)
// {
//     $product = Product::findOrFail($id); // ya Product::where('id', $id)->first();
//     return view('admin.product.edit-product', compact('product'));
// }

public function edit($id)
{
    $product = Product::with(['colors', 'images','sizes'])->findOrFail($id);
    $categories = Category::all();
    return view('admin.product.edit-product', compact('product', 'categories'));
}


public function update(Request $request, $id){
   $product = Product::findOrFail($id);
 // 1. Update basic data
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'sizes' => json_encode($request->sizes), // store as json
    ]);

     // 2. Update colors
    $product->colors()->delete();
    foreach ($request->colors ?? [] as $color) {
        $product->colors()->create(['color_code' => $color['color_code']]);
    }

    // 2. Update colors
    $product->sizes()->delete();
    foreach ($request->sizes ?? [] as $size) {
        $product->sizes()->create(['size' => $size['size']]);
    }

    // 3. Upload new images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $name = time().rand(100,999).'.'.$img->getClientOriginalExtension();
            $img->move(public_path('uploads/products'), $name);
            $product->images()->create(['image_path' => $name]);
        }
    }

     return redirect()->route('admin.product.all-product')->with('success', 'Product Updated!');




}


}
