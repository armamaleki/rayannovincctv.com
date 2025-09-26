<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store()
    {
        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

            if (!$cartItems->isEmpty()) {
                $lastOrder = Order::latest('order_number')->first();
                $orderNumber = $lastOrder ? $lastOrder->order_number + 1 : 5482;
                $totalPrice = $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                });
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total_price' => $totalPrice,
                    'status' => 'pending',
                    'order_number' => $orderNumber,
                ]);
                foreach ($cartItems as $item) {
                    $order->items()->create([
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->product->price,
                    ]);
                }
                Cart::where('user_id', auth()->id())->delete();
                return to_route('cart');
            } else {
                return to_route('checkout');
            }
        } else {
            return redirect()->route('login', ['cart' => true]);
        }
    }

    public function index()
    {
        if (auth()->check()) {
            $order = Order::where('user_id', auth()->id())
                ->where('status', 'pending')
                ->latest()
                ->first();
            return view('client.cart', compact('order'));
        } else {
            return redirect()->route('login', ['cart' => true]);
        }
    }
}
