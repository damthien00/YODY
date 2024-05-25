<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\TypeCategory;
use App\Models\TypeCategoryProduct;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categoriesWithProducts = TypeCategory::with('products.product')->get();
        $products = Product::with('variants.color', 'variants.size')
            ->get()
            ->map(function ($product) {
                $variants = $product->variants->groupBy('color_id')->map->first();
                $product->variants = $variants;
                return $product;
            });
        $categoriesHome = ProductCategory::all();
        return view('pages/User/Home/home', compact('categoriesWithProducts', 'categoriesHome'));
    }

    public function getProductsByCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->with('variants')->get();
        $products->each(function ($product) {
            $product->variants = $product->variants->unique('color_id', 'retail_price');
        });

        return $products;
    }

    public function getCategory()
    {
    }
}
