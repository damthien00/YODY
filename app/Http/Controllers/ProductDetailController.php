<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;

class ProductDetailController extends Controller
{
    public function show($id, $variant_id)
    {
        $product = Product::find($id);
        $variants = ProductVariant::where('product_id', $id)->get();
        $variantss = ProductVariant::findOrFail($variant_id);
        $product->variants = $product->variants->groupBy('color_id')->map->first();
        return view('pages/User/Product-Detail/product-detail', compact('product', 'variantss', 'variants'));
    }
}
