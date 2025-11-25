<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = Application::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.applications.index', compact('applications'));
    }

    public function create()
    {
        return view('manager.applications.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'link' => 'required|url:http,https|min:3|max:255',
            'description' => 'required|min:3|max:500',
        ]);
        $data['user_id'] = auth()->id();
        $create = Application::create($data);
        if ($create) {
            return redirect()->route('manager.application.edit', $create);
        }
        return to_route('manager.application.index')->with('message',
            [
                'type' => 'error',
                'title' => 'خطا',
                'text' => 'ذخیره با خطا مواجه شد!!',
            ]);
    }

    public function edit(Application $application)
    {
        session()->flash('message',
            [
                'type' => 'warning',
                'title' => 'ویرایش نرم افزار',
                'text' => 'دقت کنید شما در حال ویرایش نرم افزار هستید پس از ذخیره هیچ راه بازگشتی نیست!!',
            ]);
        return view('manager.applications.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        $data = $request->validate([
            'name' => 'required|min:3|max:255',
            'link' => 'required|url:http,https|min:3|max:255',
            'description' => 'required|min:3|max:500',
        ]);
        $data['user_id'] = auth()->id();
        $application->update($data);
        return redirect()->route('manager.application.index')->with('message',
            [
                'type' => 'success',
                'title' => 'تغییرات با موفقیت اعمال شد',
                'text' => 'تغییرات با موفقیت اعمال شد از این پس با تغییرات جدید در سایت دیده میشه!!!',
            ]);
    }

}
