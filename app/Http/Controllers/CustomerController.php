<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Claims\Custom;

class CustomerController extends Controller
{
    function show()
    {
        $customers = Customer::withCount('orders')
            ->withSum('orders', 'total_price') // Lấy tổng giá trị của đơn hàng của mỗi khách hàng
            ->get()
            ->groupBy('phone')
            ->map(function ($group) {
                $customer = $group->first();
                $orderCount = $customer->orders_count ?? 0;
                $totalPrice = $group->sum('orders_sum_total_price');

                $customers = [
                    'customer' => $customer,
                    'order_count' => $orderCount,
                    'total_price' => $totalPrice,
                ];
                return $customers;
            });
        return view('pages/Admin/Customer/show', compact('customers'));
    }
}
