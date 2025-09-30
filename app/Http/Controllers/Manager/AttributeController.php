<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $attributes = Attribute::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.attribute.index', compact('attributes'));
    }

    public function create()
    {
        return view('manager.attribute.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name',
            'icon' => 'required',
        ]);
        try {
            $data['user_id'] = auth()->user()->id;
            $create = Attribute::create($data);
            return redirect()->route('manager.attribute.edit', $create);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره ویژگی با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.attribute.create');
        }
    }

    public function edit(Attribute $attribute)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش مقدار',
                'text' => 'دقت کنید شما در حال ویرایش ویژگی هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.attribute.edit', compact('attribute'));
    }

    public function update(Request $request, Attribute $attribute)
    {
        $data = $request->validate([
            "name" => [
                'required',
                'max:255',
                'string',
                Rule::unique('attributes', 'name')->ignore($attribute->id),
            ],
            'icon' => 'required',
        ]);
        try {
            $data['user_id'] = auth()->user()->id;
            $attribute->update($data);
            session()->flash('message',
                [
                    'type' => 'success',
                    'title' => 'انجام شد',
                    'text' => 'ذخیره ویژگی با موفقیت انجام شد از این به بعد با مقدار های جدید در سایت نمایش داده میشود.',
                ]);
            return redirect()->route('manager.attribute.index');
        } catch (\Exception $exception) {
            LOG::error($exception->getMessage());
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره مقدار با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.attribute.edit', $attribute);
        };

    }


    public function getValues(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $attr = Attribute::where('name', $data['name'])->first();
        return response([
            'data' => $attr->values()->pluck('value')->toArray(),
        ]);
    }
}
