<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopGridController extends Controller
{


    public function index(Request $request, $slug)
    {
        $category = ProductCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        $breadcrumbs = $this->getCategoryBreadcrumbs($category);
        $categoryId = $category->id;

        $page = $request->query("page", 1);
        $size = $request->query("size", 12);
        $q_prices = $request->query("q_prices");

        // Tạo một bộ lọc trống để bắt đầu
        $productQuery = Product::query();

        // Lọc theo giá
        if (!empty($q_prices)) {
            $qPricesArray = explode(',', $q_prices);
            $productQuery->whereHas('variants', function ($query) use ($qPricesArray) {
                $query->whereIn('retail_price', $qPricesArray);
            });
        }

        // Lọc theo danh mục
        $productQuery->where('category_id', $categoryId);

        // Lọc theo màu sắc nếu có
        $q_colors = $request->query('q_colors');
        if ($q_colors) {
            $colorArray = explode(',', $q_colors);
            $productQuery->whereHas('variants.color', function ($query) use ($colorArray) {
                $query->whereIn('color_name', $colorArray);
            });
        }

        // Lọc theo kích thước nếu có
        $q_sizes = $request->query('q_sizes');
        if ($q_sizes) {
            $sizeArray = explode(',', $q_sizes);
            $productQuery->whereHas('variants.size', function ($query) use ($sizeArray) {
                $query->whereIn('size_name', $sizeArray);
            });
        }

        // Sắp xếp sản phẩm
        $orderBy = $request->get('orderBy', 'default');
        switch ($orderBy) {
            case 'alpha-asc':
                $productQuery->orderBy('product_name', 'asc');
                break;
            case 'alpha-desc':
                $productQuery->orderBy('product_name', 'desc');
                break;
            case 'price-asc':
                $productQuery->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $productQuery->orderBy('price', 'desc');
                break;
            case 'created-desc':
                $productQuery->orderBy('created_at', 'desc');
                break;
            default:
                break;
        }

        // Lấy danh sách sản phẩm
        $products = $productQuery->get();
        $productCT =
            Product::where('category_id', $categoryId)->get();
        // Lấy danh sách kích thước và màu sắc từ sản phẩm đã lọc
        $sizes = $productCT->pluck('variants')->flatten()->pluck('size')->unique('id');
        $colors = $productCT->pluck('variants')->flatten()->pluck('color')->unique('id');
        $perPage = 2;
        $products = $productQuery->paginate($perPage)->appends($request->query());
        return view('pages/User/Shop-grid/shop-grid', compact('q_colors', 'q_sizes', 'colors', 'sizes', 'orderBy', 'category', 'breadcrumbs', 'products', 'q_prices'));
    }

    private function getCategoryBreadcrumbs($category)
    {
        $breadcrumbs = [];
        while ($category) {
            array_unshift($breadcrumbs, $category); // Thêm vào đầu mảng
            $category = $category->parent;
        }
        return $breadcrumbs;
    }
}
