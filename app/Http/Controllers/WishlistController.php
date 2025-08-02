<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Wishlist;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
 

public function add(Request $request)
{
    $data = $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);

    Wishlist::firstOrCreate([
        'user_id' => auth()->id(),
        'product_id' => $data['product_id'],
    ]);

    return back()->with('success', 'Added to wishlist successfully!');
}

public function totalwishlist()
{
    if (Auth::check()) {
       
        $user_id = Auth::id();
        $count = Wishlist::where('user_id', $user_id)->count();
    } else {
       
        $session_id = Session::getId();
        $count = Wishlist::where('session_id', $session_id)->count();
    }

    return response()->json(['total' => $count]);
}


}
