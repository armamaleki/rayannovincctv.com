<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Granite;
use Illuminate\Http\Request;

class GraniteController extends Controller
{
    public function index(Request $request)
    {
        $granities = Granite::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.granite.index', compact('granities'));
    }


    public function create()
    {
        return view('manager.granite.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|unique:granites,name|max:255',
            'duration' => 'required|string|max:255',
        ]);
        $create = Granite::create($data);
        return redirect()->route('manager.granite.edit', $create);
    }

    public function edit(Granite $granite)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش مقاله',
                'text' => 'دقت کنید شما در حال ویرایش گارانتی هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.granite.edit', compact('granite'));
    }

    public function update(Request $request, Granite $granite){
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:granites,name,'. $granite->id,
            'duration' => 'required|string|max:255',
        ]);
        $update = $granite->update($data);
        return redirect()->route('manager.granite.index')->with('message',
            [
                'type' => 'success',
                'title' => 'تعییرات اعمال شد',
                'text' => 'تغییرات با موفقیت اعمال شد از این پس با تغییرات جدید در سایت دیده میشه!!!',
            ]);
    }
}
