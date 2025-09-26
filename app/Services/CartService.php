<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{

    public function addToCart($productId, $quantity = 1)
    {
        if (auth()->check()) {
            Cart::updateOrCreate(
                ['user_id' => auth()->id(), 'product_id' => $productId],
                ['quantity' => DB::raw("quantity + $quantity")]
            );
        } else {
            $sessionId = Session::getId();
            Cart::updateOrCreate(
                ['session_id' => $sessionId, 'product_id' => $productId],
                ['quantity' => DB::raw("quantity + $quantity")]
            );
        }
    }

    public function getCartItems()
    {
        if (auth()->check()) {
            return Cart::where('user_id', auth()->id())->with('product')->get();
        } else {
            return Cart::where('session_id', Session::getId())->with('product')->get();
        }
    }
    public function removeFromCart($productId)
    {
        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->where('product_id', $productId)->delete();
        } else {
            Cart::where('session_id', Session::getId())->where('product_id', $productId)->delete();
        }
    }

    public function clearCart()
    {
        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->delete();
        } else {
            Cart::where('session_id', Session::getId())->delete();
        }
    }

    public function moveGuestCartToUser()
    {
        if (!auth()->check()) return;

        $sessionId = Session::getId();
        $guestCartItems = Cart::where('session_id', $sessionId)->get();

        foreach ($guestCartItems as $item) {
            $existingCartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $item->product_id)
                ->first();

            if ($existingCartItem) {
                $existingCartItem->update([
                    'quantity' => $existingCartItem->quantity + $item->quantity,
                ]);
            } else {
                $item->update([
                    'user_id' => auth()->id(),
                    'session_id' => null,
                ]);
            }
        }
    }

}
