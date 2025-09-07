<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('phone', 'like', "%{$request->q}%")
            ->orWhere('name', 'like', "%{$request->q}%")
            ->get();
        return view('manager.user.index' , compact('users'));
    }
}
