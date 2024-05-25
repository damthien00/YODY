<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductDetailImage;
use Illuminate\Http\Request;

class ProductDetailImageController extends Controller
{
    public function destroy($id)
    {
        $productDetailImage = ProductDetailImage::findOrFail($id);
        $productDetailImage->delete();
        return response()->json(['message' => 'Product detail image deleted successfully']);
    }
}
