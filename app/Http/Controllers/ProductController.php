<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductDetailImage;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use Illuminate\Foundation\Http\FormRequest;
use app\Http\Requests\ProductFormRequest;
use App\Models\Color;
use App\Models\Size;
use App\Models\VariantImageDetail;

class ProductController extends Controller
{
    public function getCategoryAndBrand()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        // dd($categories);
        return view('pages/Admin/Products/create', compact('categories', 'brands'));
    }
    public function index(Request $request)
    {
        //Product
        $query = Product::query();
        $products = $query->get();
        //Category
        $uniqueCategoryIds = $products->pluck('category_id')->unique();
        $categories = ProductCategory::whereIn('id', $uniqueCategoryIds)->get();

        //Brand
        $uniqueBrandIds = $products->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $uniqueBrandIds)->get();
        $categoryIds = $request->query('category_ids');
        $brandIds = $request->query('brand_ids');
        $createdOnMin = $request->query('created_on_min');
        $createdOnMax = $request->query('created_on_max');
        $productsQuery = Product::query();

        if ($categoryIds) {
            $categoryIds = urldecode($categoryIds);
            $productsQuery->whereHas('category', function ($query) use ($categoryIds) {
                $query->whereIn(
                    'id',
                    explode(',', $categoryIds)
                );
            });
        }
        if ($brandIds) {
            $brandIds = urldecode($brandIds);
            $productsQuery->whereHas('brand', function ($query) use ($brandIds) {
                $query->whereIn(
                    'id',
                    explode(',', $brandIds)
                );
            });
        }


        if (
            $createdOnMin && $createdOnMax
        ) {
            // Assuming dates are in 'd/m/Y' format, convert to 'Y-m-d' for comparison
            $startDate = Carbon::createFromFormat('d/m/Y', $createdOnMin)->format('Y-m-d');
            $endDate = Carbon::createFromFormat('d/m/Y', $createdOnMax)->format('Y-m-d');
            $productsQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $products = $productsQuery->get();
        $totalInventoryQuantity = 0;
        foreach ($products as $product) {
            $totalInventoryQuantity += $product->variants->sum('inventory_quantity');
        }

        return view('pages/Admin/Products/show', compact('products', 'totalInventoryQuantity', 'createdOnMin', 'createdOnMax', 'categoryIds', 'brandIds', 'categories', 'brands'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('pages/Admin/Products/create', compact('sizes', 'colors', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $imageVariant = [];

        foreach ($request->variants as $key => $variant) {
            $pvariant = ProductVariant::create([
                'product_id' => $product->id,
                'barcode' => $variant['barcode'],
                'sku' => $variant['sku'],
                'inventory_quantity' => $variant['inventory_quantity'],
                'retail_price' => $variant['retail_price'],
                'wholesale_price' => $variant['wholesale_price'],
                'import_price' => $variant['import_price'],
                'weight' => $variant['weight'],
                'weight_unit' => $variant['weight_unit'],
                'size_id' => $variant['size_id'],
                'color_id' => $variant['color_id'],
            ]);
            if ($request->hasFile("variants.$key.image_variant")) {
                $uploadPath = '/uploads';
                $imageFiles = $request->file("variants.$key.image_variant");

                foreach ($imageFiles as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = uniqid() . '.' . $extension;
                    $imageFile->move(public_path($uploadPath), $filename);
                    $imageVariant[] = [
                        'variant_id' => $pvariant->id,
                        'image' => $uploadPath . '/' . $filename
                    ];
                }
            }
        }
        VariantImageDetail::insert($imageVariant);
        return redirect()->route('products.show')->with('success', 'Product added successfully');
    }

    public function show($product_id, $variant_id)
    {
        $product = Product::findOrFail($product_id);
        $variantss = ProductVariant::findOrFail($variant_id);
        return view('pages/Admin/Products/detail', compact('product', 'variantss'));
    }
    public function edit($product_id, $variant_id)
    {
        $product = Product::findOrFail($product_id);
        $variantss = ProductVariant::findOrFail($variant_id);
        $categories = ProductCategory::all();
        $brands = Brand::all();
        return view('pages/Admin/Products/edit', compact('product', 'variantss', 'categories', 'brands'));
    }

    public function update(Request $request, $product_id, $variant_id)
    {
        $product = Product::findOrFail($product_id);
        $variant = ProductVariant::findOrFail($variant_id);
        $product->update($request->all());
        $variant->update($request->all());

        $imageVariant = [];
        if ($request->hasFile("version_image_update")) {
            $uploadPath = '/uploads';
            foreach ($request->file("version_image_update") as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename =
                    uniqid() . '.' . $extension;
                $imageFile->move(public_path($uploadPath), $filename);
                $imageVariant[] = [
                    'variant_id' => $variant->id,
                    'image' => $uploadPath . '/' . $filename
                ];
            }
        }
        VariantImageDetail::insert($imageVariant);
        return redirect()->route('products.show')->with('success', 'Product update successfully');
    }

    public function destroy($product_id)
    {
        $variants = ProductVariant::where('product_id', $product_id)->get();
        foreach ($variants as $variant) {
            $imageDetails = VariantImageDetail::where('variant_id', $variant->id)->get();
            foreach ($imageDetails as $imageDetail) {
                $imagePath = public_path($imageDetail->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Xóa tệp tin ảnh
                }
            }
            $variant->delete();
        }
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect()->route('products.show');
    }
}
