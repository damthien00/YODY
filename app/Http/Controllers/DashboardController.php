<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $createdOnMin = $request->query('created_on_min');
        $createdOnMax = $request->query('created_on_max');
        if ($createdOnMin && $createdOnMax) {
            // Assuming dates are in 'd/m/Y' format, convert to 'Y-m-d' for comparison
            $startDate = Carbon::createFromFormat('d/m/Y', $createdOnMin)->startOfDay();
            $endDate = Carbon::createFromFormat('d/m/Y', $createdOnMax)->endOfDay();
            $revenueData = Orders::whereBetween('created_at', [$startDate, $endDate])
                ->orderBy('created_at')
                ->get()
                ->map(function ($order) {
                    return [
                        'year' => Carbon::parse($order->created_at)->format('d/m/Y'),
                        'a' => $order->total_price,
                    ];
                });
        } else {
            $createdOnMin = now()->subWeek()->startOfWeek()->toDateString();
            $createdOnMax = now()->endOfWeek()->toDateString();
            $revenueData = Orders::whereBetween('created_at', [$createdOnMin, $createdOnMax])
                ->orderBy('created_at')
                ->get()
                ->map(function ($order) {
                    return [
                        'year' => Carbon::parse($order->created_at)->format('d/m/Y'),
                        'a' => $order->total_price,
                    ];
                });
        }
        return view('pages/Admin/Dashboard/dashboard', compact('revenueData', 'createdOnMin', 'createdOnMax'));
        // return response()->json($revenueData);
    }

    public function filter(Request $request)
    {
        $createdOnMin = Carbon::createFromFormat('d/m/Y', $request->input('created_on_min'))->startOfDay();
        $createdOnMax =  Carbon::createFromFormat('d/m/Y', $request->input('created_on_max'))->startOfDay();
        $revenueData = Orders::whereBetween('created_at', [$createdOnMin, $createdOnMax])
            ->orderBy('created_at')
            ->get()
            ->map(function ($order) {
                return [
                    'year' => Carbon::parse($order->created_at)->format('d/m/Y'), // Định dạng lại ngày tháng
                    'a' => $order->total_price,
                ];
            });

        return view('pages/Admin/Dashboard/dashboard', compact('revenueData', 'createdOnMin', 'createdOnMax'));
        // return response()->json($revenueData);
    }
}
