<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchProducts = Product::where('product_name', 'LIKE', "%$query%")

            ->get();

        return view('vendor.search.results-partial', ['searchProducts' => $searchProducts]);
    }
}
