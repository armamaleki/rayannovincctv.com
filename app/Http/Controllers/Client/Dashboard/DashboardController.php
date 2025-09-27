<?php

namespace App\Http\Controllers\Client\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->orderBy('updated_at', 'desc')->take(5)->get();
        $transactions = auth()->user()->transactions()->orderBy('updated_at', 'desc')->take(5)->get();
        return view('client.dashboard.index', compact('orders', 'transactions'));
    }

    public function orders()
    {
        $orders = auth()->user()->orders;
        return view('client.dashboard.orders', compact('orders'));
    }

    public function transactions()
    {
        $transactions = auth()->user()->transactions;
        return view('client.dashboard.transactions', compact('transactions'));
    }
}
