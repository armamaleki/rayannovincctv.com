<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function index(Request $request)
    {
        $values = Value::latestUpdated()
            ->where('name', 'LIKE', '%' . $request->q . '%')
            ->paginate(100);
        return view('manager.value.index', compact('values'));
    }

    public function create()
    {
        return view('manager.value.create');
    }

    public function store(Request $request)
    {

    }


}
