<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('index');
    }

    public function user_order()
    {
 $userid = auth()->id();
    $allorder = Order::where('user_id', $userid)->get();
        return view('order',compact('allorder'));
    }



  public function user_dashboard()
{
    $userId = auth()->id(); // Current logged-in user ka ID
    $totalOrders = Order::where('user_id', $userId)->count();

      $pendingOrders = Order::where('user_id', $userId)
        ->where('payment_status', 'pending')
        ->count();

    // Successful orders
    $successfulOrders = Order::where('user_id', $userId)
        ->where('payment_status', 'successful')
        ->count();

        $cancelOrders = Order::where('user_id', $userId)
        ->where('payment_status', 'Cancel')
        ->count();

        $userid = auth()->id();
    $allorder = Order::where('user_id', $userid)->get();


    return view('user-dashboard', compact('allorder','totalOrders','pendingOrders', 'successfulOrders','cancelOrders'));
}





}
