<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TypeCategory;
use App\Models\TypeCategoryProduct;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    function show()
    {
        $type_categories = TypeCategory::all();
        return view('/pages/Admin/TypeCategory/index', compact('type_categories'));
    }

    public function create()
    {
        $type_categories = TypeCategory::all();
        return view('/pages/Admin/TypeCategory/create', compact('type_categories')); // Chuyển đến view để tạo mới bài viết
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $uploadPath = '/uploads';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $imageFile->move(public_path($uploadPath), $filename);
            $data['image'] = $uploadPath . '/' . $filename;
        }
        TypeCategory::create($data);

        return redirect()->route('type_category.index')
            ->with('success', 'Bài viết đã được tạo thành công.');
    }
    public function edit($id)
    {
        $type_category = TypeCategory::find($id);
        $list_product = Product::all();
        if (!$type_category) {
            return redirect()->route('type_category.index')->with('error', 'Bài viết không tồn tại');
        }
        $products = $type_category->products()->with('product')->get()->pluck('product');
        $associatedProductIds = $products->pluck('id')->toArray(); // Extract the IDs of associated products
        return view('/pages/Admin/TypeCategory/edit', compact('type_category', 'products', 'list_product', 'associatedProductIds'));
    }

    public function deleteProduct(Request $request)
    {
        $typeCategoryId = $request->input('type_category_id');
        $productId = $request->input('product_id');
        dd($typeCategoryId, $productId);
        // Xóa sản phẩm khỏi loại danh mục
        $deleted = TypeCategoryProduct::where('type_category_id', $typeCategoryId)
            ->where('product_id', $productId)
            ->delete();

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Sản phẩm đã được xóa thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Có lỗi xảy ra, vui lòng thử lại!']);
        }
    }

    public function saveProducts(Request $request)
    {
        $typeCategoryId = $request->input('type_category_id');
        $productIds = $request->input('products');
        $typeCategory = TypeCategory::find($typeCategoryId);
        if (!$typeCategory) {
            return response()->json(['success' => false, 'message' => 'Loại danh mục không tồn tại']);
        }

        // Xóa tất cả các liên kết hiện có trước khi thêm mới
        TypeCategoryProduct::where('type_category_id', $typeCategoryId)->delete();

        // Thêm các sản phẩm đã chọn vào loại danh mục
        foreach ($productIds as $productId) {
            $existingLink = TypeCategoryProduct::where('product_id', $productId)
                ->where('type_category_id', $typeCategoryId)
                ->first();
            // Nếu liên kết chưa tồn tại, tạo mới
            if (!$existingLink) {
                TypeCategoryProduct::create(['type_category_id' => $typeCategoryId, 'product_id' => $productId]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Sản phẩm đã được lưu thành công!']);
    }


    public function update($id, Request $request)
    {
        $type_category = TypeCategory::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $uploadPath = '/uploads';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $imageFile->move(public_path($uploadPath), $filename);

            // Xóa ảnh cũ nếu có
            if ($type_category->image && file_exists(public_path($type_category->image))) {
                unlink(public_path($type_category->image));
            }
            $data['image'] = $uploadPath . '/' . $filename;
        }

        $type_category->update($data);

        return redirect()->route('type_category.index')
            ->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $type_category = TypeCategory::findOrFail($id);
        $type_category->delete();
        return redirect()->route('type_category.index')
            ->with('success', 'Bài viết đã được xóa thành công.');
    }
}
