<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\PriceList;
use Illuminate\Http\Request;

class PriceListController extends Controller
{
    public function index(Request $request)
    {
        $priceLists = PriceList::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.price-list.index', compact('priceLists'));
    }

    public function create()
    {
        return view('manager.price-list.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        $create = PriceList::create($data);
        if ($create) {
            return to_route('manager.price-list.edit', $create);
        } else {
            return to_route('manager.price-list.index')->with('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره با خطا مواجه شد!!',
                ]);
        }

    }

    public function edit(PriceList $priceList)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش نرم افزار',
                'text' => 'دقت کنید شما در حال ویرایش نرم افزار هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.price-list.edit', compact('priceList'));
    }

    public function update(Request $request, PriceList $priceList)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $data['user_id'] = auth()->id();
        $update = $priceList->update($data);
        if ($update) {
            return to_route('manager.price-list.index')->with('message',
                [
                    'type' => 'success',
                    'title' => 'تغییرات با موفقیت اعمال شد',
                    'text' => 'تغییرات با موفقیت اعمال شد از این پس با تغییرات جدید در سایت دیده میشه!!!',
                ]);
        }
    }

    public function price_list(Request $request, PriceList $priceList)
    {
        $request->validate([
            'price_list' => 'required|mimes:pdf|max:20480',
        ]);
        $priceList->clearMediaCollection('price_list');
        $priceList->addMediaFromRequest('price_list')
            ->toMediaCollection('price_list');
        return back()->with('message',
            [
                'type' => 'success',
                'title' => 'انجام شد',
                'text' => 'دیتا شیت با موفیت اپلود شد.',
            ]);
    }
}
