<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Support\Facades\Http;

use App\Models\Product;
use App\Models\Order;
use App\Models\Order_items;

class CheckoutController extends Controller
{


public function checkout()
{
    if (Auth::check()) {
        // Logged-in user
        $userId = Auth::id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
    } else {
        // Guest user using session ID
        $session_id = Session::getId();
        $cartItems = Cart::with('product')->where('session_id', $session_id)->get();
    }

    $subtotal = $cartItems->sum(function($item) {
        return $item->product->dp_price ?? $item->product->price ?? 0;
    });

    $discount = 0;
    $tax = ($subtotal - $discount) * 0.05;
    $total = ($subtotal - $discount) + $tax;

    return view('checkout', compact('cartItems', 'subtotal', 'discount', 'tax', 'total'));
}



public function placeOrder(Request $request)
{
    $user = Auth::user();
    $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Cart is empty');
    }

    $order = new Order();
    $order->user_id = $user->id;
    $order->name = $request->name;
     $order->email = $request->email;
    $order->address = $request->address;
    $order->phone = $request->phone;
    $order->amount = $cartItems->sum(fn($item) => $item->product->dp_price ?? $item->product->price);
    $order->payment_status = 'pending';
    $order->save();

    foreach ($cartItems as $item) {
        Order_items::create([
            'order_id' => $order->id,
            'product_id' => $item->product->id,
            'quantity' => $item->quantity,
            'price' => $item->product->dp_price ?? $item->product->price,
        ]);
    }

    // 🔁 Initiate PhonePe Payment
    return $this->initiatePhonePePayment($order);
}


public function initiatePhonePePayment($order)
{
    $amount = $order->amount * 100; // In paisa
    $merchantId = 'SU2504301641073518340399';
    $redirectUrl = route('payment.success');
    $failureUrl = route('payment.failed');

    $data = [
        "merchantId" => $merchantId,
        "transactionId" => "ORD" . $order->id,
        "amount" => $amount,
        "merchantUserId" => $order->user_id,
        "redirectUrl" => $redirectUrl,
        "redirectMode" => "POST",
        "callbackUrl" => url('/phonepe-callback'),
        "paymentInstrument" => [
            "type" => "PAY_PAGE",
        ]
    ];

    $json = json_encode($data);
    $base64 = base64_encode($json);

    $saltKey = '829729d9-d0a9-42dd-a3b8-08d1f39e0f45';
    $saltIndex = '1';

    $sha256 = hash('sha256', $base64 . "/pg/v1/pay" . $saltKey);
    $finalXVerify = $sha256 . '###' . $saltIndex;

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'X-VERIFY' => $finalXVerify,
    ])->post('https://api.phonepe.com/apis/hermes/pg/v1/pay', [
        'request' => $base64
    ]);

    if ($response->successful()) {
        $redirectUrl = $response->json('data.instrumentResponse.redirectInfo.url');
        return redirect()->away($redirectUrl);
    } else {
        return back()->with('error', 'Payment initialization failed');
    }
}


public function paymentSuccess(Request $request)
{
    $transactionId = $request->transactionId;
    $order = Order::where('transaction_id', $transactionId)->first();

    if ($order) {
        $order->status = 'success';
        $order->save();

        // 🧹 Clear Cart
        Cart::where('user_id', $order->user_id)->delete();

        return view('frontend.thankyou');
    }

    return view('frontend.failed');
}


public function paymentFailed(Request $request)
{
    return view('frontend.failed');
}




}
