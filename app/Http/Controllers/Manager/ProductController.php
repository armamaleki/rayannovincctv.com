<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\Product\StoreProductRequest;
use App\Http\Requests\Manager\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.product.index', compact('products'));
    }

    public function create()
    {
        return view('manager.product.create');
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $data['slug'] = Str::slug($data['slug'], '-', '');
            $create = Product::create($data);
            return redirect()->route('manager.product.edit', $create);
        } catch (\Exception $exception) {
            Log::error($exception);
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره محصول با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.product.create');
        }
    }


    public function edit(Product $product)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش محصول',
                'text' => 'دقت کنید شما در حال ویرایش محصول هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.product.edit', compact('product'));
    }

    public function update(UpdateproductRequest $request, Product $product)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['slug'], '-', '');
        $update = $product->update($data);
        return redirect()->route('manager.product.index')->with('message',
            [
                'type' => 'success',
                'title' => 'تعییرات اعمال شد',
                'text' => 'تغییرات با موفقیت اعمال شد از این پس با تغییرات جدید در سایت دیده میشه!!!',
            ]);
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'croppedImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $product = Product::findOrFail($request->model);
        $product->clearMediaCollection('avatars');
        $name = $request->croppedImage->store('avatars/', 'public');
        $product->addMedia(storage_path('app/public/' . $name))
            ->toMediaCollection('avatars', 'public');
        return response()->json(['success' => true]);
    }


}
