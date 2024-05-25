<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('pages/Admin/Orders/show', compact('orders'));
    }
    public function show($id)
    {
        $order = Orders::findOrFail($id);
        return view('pages/Admin/Orders/detail', compact('order'));
    }
}
