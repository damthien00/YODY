<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function show($slug)
    {
        $category = ProductCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $categoryWithChildren = $category->load('allChildren');
        $categoriesArray = [];
        foreach ($categoryWithChildren->children as $child) {
            $this->flattenCategories($child, $categoriesArray);
        }
        $bestSellingProducts = DB::table('order_details')
            ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->take(10) // Limit to top 10 best-sellers, adjust as needed
            ->get();

        // Get product details for best-selling products
        $bestSellingProductDetails = Product::whereIn('id', $bestSellingProducts->pluck('product_id'))->get();
        return view('pages.User.Shop.shop', compact('categoriesArray', 'bestSellingProductDetails'));
    }

    private function flattenCategories($category, &$categoriesArray = [])
    {
        if ($category->children->isEmpty()) {
            $categoriesArray[] = ['name' => $category->category_name, 'slug' => $category->slug, 'image' => $category->image];
        } else {
            foreach ($category->children as $child) {
                $this->flattenCategories($child, $categoriesArray);
            }
        }
        return $categoriesArray;
    }
}
