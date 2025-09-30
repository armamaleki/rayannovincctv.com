<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ValueController extends Controller
{
    public function index(Request $request)
    {
        $values = AttributeValue::latestUpdated()
            ->where('value', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.attribute.value.index', compact('values'));
    }

    public function create()
    {
        $attributes = Attribute::latestUpdated()->get();
        return view('manager.attribute.value.create' , compact('attributes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required|string|max:255|unique:attribute_values',
            'attribute' => 'required|integer|exists:attributes,id',
        ]);
        try {
            $data['attribute_id'] = $data['attribute'];
            $create = AttributeValue::create($data);
            return redirect()->route('manager.value.edit', $create);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره مقدار با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.value.create');
        }
    }

    public function edit(AttributeValue $value)
    {
        $attributes = Attribute::latestUpdated()->get();
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش مقدار',
                'text' => 'دقت کنید شما در حال ویرایش مقدار هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.attribute.value.edit', compact('value' , 'attributes'));
    }

    public function update(Request $request, AttributeValue $value)
    {
        $data = $request->validate([
            "value" => [
                'required',
                'max:255',
                'string',
                Rule::unique('attribute_values', 'value')->ignore($value->id),
            ],
            'attribute' => 'required|integer|exists:attributes,id',
        ]);
        try {
            $data['attribute_id'] = $data['attribute'];
            $value->update($data);
            session()->flash('message',
                [
                    'type' => 'success',
                    'title' => 'انجام شد',
                    'text' => 'ذخیره مقدار با موفقیت انجام شد از این به بعد با مقدار های جدید در سایت نمایش داده میشود.',
                ]);
            return redirect()->route('manager.value.index');
        } catch (\Exception $exception) {
            LOG::error($exception->getMessage());
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره مقدار با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.value.edit', $value);
        }

    }


}
