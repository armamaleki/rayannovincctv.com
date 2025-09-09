<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class ValueController extends Controller
{
    public function index(Request $request)
    {
        $values = Value::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.attribute.value.index', compact('values'));
    }

    public function create()
    {
        return view('manager.attribute.value.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:values',
        ]);
        try {
            $data['user_id'] = auth()->user()->id;
            $create = Value::create($data);
            return redirect()->route('manager.value.edit', $create);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            session()->flash('message',
                [
                    'type' => 'error',
                    'title' => 'خطا',
                    'text' => 'ذخیره مقدار با خطا مواجه شد مجدد تلاش کنید',
                ]);
            return redirect()->route('manager.attribute.value.create');
        }
    }

    public function edit(Value $value)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش مقدار',
                'text' => 'دقت کنید شما در حال ویرایش مقدار هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.attribute.value.edit', compact('value'));
    }

    public function update(Request $request, Value $value)
    {
        $data = $request->validate([
            "name" => [
                'required',
                'max:255',
                'string',
                Rule::unique('values', 'name')->ignore($value->id),
            ],
        ]);
        try {
            $data['user_id'] = auth()->user()->id;
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

        };

    }


}
