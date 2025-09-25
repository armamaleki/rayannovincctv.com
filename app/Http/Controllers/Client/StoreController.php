<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::where('status' , 'active')->latest()->paginate(12);
        return view('client.store.index' , compact('products'));
    }
}
