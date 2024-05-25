<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantImageDetail;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    function create($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('/pages/Admin/Products/create-version', compact('product_id', 'product'));
    }
    function store($product_id)
    {
        return redirect()->back();;
    }
    public function destroy($id)
    {
        $variantImageDetail = VariantImageDetail::findOrFail($id);
        $imagePath = public_path($variantImageDetail->image);
        // Xóa tệp tin ảnh nếu tồn tại
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa tệp tin
        }
        $variantImageDetail->delete();

        return response()->json(['message' => 'Product detail image deleted successfully']);
    }
}
