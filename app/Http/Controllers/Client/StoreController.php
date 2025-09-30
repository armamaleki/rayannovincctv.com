<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $filters = request()->query();
        $query = Product::where('status', 'active');
        foreach ($filters as $attrName => $attrValue) {
            if ($attrName === 'sort') continue;

            $query->whereHas('attributeValues', function ($q) use ($attrName, $attrValue) {
                $q->whereHas('attribute', function ($q2) use ($attrName) {
                    $q2->where('name', $attrName);
                })->where('value', $attrValue);
            });
        }
        if ($min = request('min_price')) {
            $query->where('price', '>=', $min);
        }
        if ($max = request('max_price')) {
            $query->where('price', '<=', $max);
        }

        $query->orderByRaw('price IS NULL ASC');
        switch (request('sort')) {
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            default: // latest
                $query->latest();
        }

        $products = $query->paginate(12);

        $attributes = Attribute::with('values')->get();
        return view('client.store.index', compact('products' , 'attributes'));
    }

    public function show(Product $product)
    {
        if ($product->status !== 'active') {
            abort(404);
        }
        $product->load([
            'attributes.values',
            'attributeValues'
        ]);

        return view('client.store.show', compact('product'));
    }
}
