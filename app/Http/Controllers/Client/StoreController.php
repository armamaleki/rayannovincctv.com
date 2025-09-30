<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->latest()->paginate(12);
        return view('client.store.index', compact('products'));
    }

    public function show(Product $product)
    {
        if ($product->status !== 'active') {
            abort(404);
        }
        $product->load([
            'attributes.values',   // Attribute ها و value هاشون
            'attributeValues'      // مقادیر انتخاب شده برای این محصول
        ]);
        return view('client.store.show', compact('product'));
    }
}
