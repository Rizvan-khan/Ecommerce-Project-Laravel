<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartController extends Controller

{
  

public function add(Request $request)
{
    $data = $request->validate([
        'product_id' => 'required|exists:products,id',
        'color' => 'nullable|string',
        'size' => 'nullable|string',
        'quantity' => 'nullable|integer|min:1',
    ]);

    Cart::create([
        'user_id' => auth()->id(),
        'product_id' => $data['product_id'],
        'color' => $data['color'],
        'size' => $data['size'],
        'quantity' => $data['quantity'],
    ]);

    return response()->json(['message' => '🛒 Product added to cart']);
}


public function viewCart()
{
    if (Auth::check()) {
        $user_id = Auth::id();
        $cartItems = Cart::with('product') // assuming cart has product_id
                        ->where('user_id', $user_id)
                        ->get();
    } else {
        $session_id = Session::getId();
        $cartItems = Cart::with('product')
                        ->where('session_id', $session_id)
                        ->get();
    }

    return view('cart', compact('cartItems'));
}



public function totalitem()
{
    if (Auth::check()) {
       
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
    } else {
       
        $session_id = Session::getId();
        $count = Cart::where('session_id', $session_id)->count();
    }

    return response()->json(['total' => $count]);
}

public function getAllCartProduct()
{
    $userId = auth()->check() ? auth()->id() : session()->getId();

    $cartItems = Cart::with('product')
        ->where('user_id', $userId)
        ->get();

    $subtotal = 0;

    foreach ($cartItems as $item) {
        $subtotal += $item->quantity * $item->product->dp_price;
    }

    return response()->json([
        'items' => $cartItems,
        'count' => $cartItems->count(),
        'subtotal' => $subtotal,
    ]);
}



public function remove(Request $request)
{
    $cartId = $request->id;

    if (Auth::check()) {
        // ✅ Logged-in user
        $cartItem = Cart::where('id', $cartId)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found or does not belong to user']);
        }
    } else {
        // ✅ Guest user - session-based cart
        $cart = session()->get('cart', []);

        if (isset($cart[$cartId])) {
            unset($cart[$cartId]);
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found in session cart']);
        }
    }
}






}
