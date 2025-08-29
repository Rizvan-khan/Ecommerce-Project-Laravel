<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class CartController extends Controller

{

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'quantity' => 'sometimes|integer|min:1',
        ]);

        $data['quantity'] = $data['quantity'] ?? 1;

        if (auth()->check()) {
            // Logged in → store in DB
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $data['product_id'],
                'color' => $data['color'],
                'size' => $data['size'],
                'quantity' => $data['quantity'],
            ]);
        } else {
            // Guest user → store in session
            $cart = session()->get('cart', []);
            $cart[] = $data;  // Add new product to existing cart
            session()->put('cart', $cart); // Save updated cart
        }

        return response()->json(['message' => '🛒 Product added to cart']);
    }



    public function viewCart()
    {
        $cartItems = [];
        $subtotal = 0;

        if (Auth::check()) {
            // Logged-in user cart
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

            foreach ($cartItems as $item) {
                if ($item->product && isset($item->product->price)) {
                    $subtotal += $item->product->dp_price * $item->quantity;
                }
            }
        } else {
            // Guest user - session cart
            $sessionCart = session('cart', []);
            $cartItems = [];

            foreach ($sessionCart as $item) {
                $product = Product::find($item['product_id']);

                if ($product) {
                    $quantity = isset($item['quantity']) ? (int)$item['quantity'] : 1;

                    // Sanitize price if needed
                    $price = isset($product->dp_price) ? (float)$product->dp_price : 0;

                    $subtotal += $price * $quantity;

                    $cartItems[] = (object) [
                        'id' => $product->id, // To prevent undefined id error in Blade
                        'product' => $product,
                        'quantity' => $quantity,
                        'price' => $price,
                    ];
                }
            }
        }

        // Discount
        $discountPercent = session('discount_percent', 0);
        $discount = ($discountPercent / 100) * $subtotal;

        // Tax (5%)
        $tax = 0.05 * $subtotal;

        // Total
        $total = ($subtotal - $discount) + $tax;

        return view('cart', compact('cartItems', 'subtotal', 'discount', 'tax', 'total', 'discountPercent'));
    }


    public function applyCoupon(Request $request)
    {
        $code = $request->coupon_code;
        // Example: You can make this dynamic from DB too
        $validCoupons = [
            'HEM4556JL' => 10, // 10% off
            'SAVE5' => 5,      // 5% off
        ];

        if (array_key_exists($code, $validCoupons)) {
            session(['coupon_code' => $code, 'discount_percent' => $validCoupons[$code]]);
            return response()->json(['status' => true, 'message' => 'Coupon applied successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Invalid coupon code.']);
        }
    }



    public function totalitem()
    {
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        } else {
            $count = count(session('cart', []));
        }

        return response()->json(['total' => $count]);
    }


    public function getAllCartProduct()
    {
        $subtotal = 0;

        if (auth()->check()) {
            $cartItems = Cart::with('product')
                ->where('user_id', auth()->id())
                ->get();
        } else {
            $sessionCart = session('cart', []);
            $cartItems = [];

            foreach ($sessionCart as $item) {
                $product = \App\Models\Product::find($item['product_id']);
                if ($product) {
                    $subtotal += $item['quantity'] * $product->dp_price;
                    $cartItems[] = (object) [
                        'product_id' => $item['product_id'],
                        'product' => $product,
                        'color' => $item['color'] ?? null,
                        'size' => $item['size'] ?? null,
                        'quantity' => $item['quantity'],
                    ];
                }
            }

            return response()->json([
                'items' => $cartItems,
                'count' => count($cartItems),
                'subtotal' => $subtotal,
            ]);
        }

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
            $cartItem = Cart::where('id', $cartId)
                ->where('user_id', Auth::id())
                ->first();

            if ($cartItem) {
                $cartItem->delete();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Item not found']);
            }
        } else {
            // Remove by index
            $cart = session()->get('cart', []);
            if (isset($cart[$cartId])) {
                unset($cart[$cartId]);
                session()->put('cart', $cart);
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Item not found in session']);
            }
        }
    }
}
