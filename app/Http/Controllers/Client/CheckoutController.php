<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        } else {
            $cartItems = Cart::where('session_id', Session::getId())->with('product')->get();
        }
        return view('client.checkout', compact('cartItems'));
    }

    public function remove(Request $request)
    {
        $delete = Cart::findOrFail($request->item);
        $delete->delete();
        return to_route('client.checkout');
    }

}
