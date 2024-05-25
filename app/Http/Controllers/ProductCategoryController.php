<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{

    private $htmlSelect;
    public function __construct()
    {
        $this->htmlSelect = '';
    }

    public function index()
    {
        $categories = ProductCategory::all();
        $sortedCategories = $this->buildTree($categories);
        return view('pages.Admin.Category.show', compact('sortedCategories'));
    }

    private function buildTree($categories, $parentId = 0, $level = 0)
    {
        $branch = [];
        foreach ($categories as $category) {
            if ($category->parent_category_id == $parentId) {
                $category->level = $level;
                $children = $this->buildTree($categories, $category->id, $level + 1);
                if ($children) {
                    $category->children = $children;
                }
                $branch[] = $category;
            }
        }

        // Sắp xếp các nhánh theo tên danh mục
        usort($branch, function ($a, $b) {
            return strcmp($a->category_name, $b->category_name);
        });

        return $branch;
    }
    public function categoryRecursive($id, $text = '', $selectedCategoryId = null)
    {
        $categories = ProductCategory::all()->keyBy('id');
        $this->htmlSelect = '';
        $this->buildCategoryOptions($categories, $id, $text, $selectedCategoryId);
        return $this->htmlSelect;
    }

    private function buildCategoryOptions($categories, $parentId, $text, $selectedCategoryId)
    {
        foreach ($categories as $category) {
            if ($category['parent_category_id'] == $parentId) {
                $selected = $category['id'] == $selectedCategoryId ? 'selected' : '';
                $this->htmlSelect .= '<option value="' . $category['id'] . '" ' . $selected . '>' . $text . $category['category_name'] . '</option>';
                $this->buildCategoryOptions($categories, $category['id'], $text . $category['category_name'] . ' > ', $selectedCategoryId);
            }
        }
    }
    public function create()
    {
        $htmlOption = $this->categoryRecursive(0);

        return view('pages/Admin/Category/create', compact('htmlOption'));
    }

    private function getLevel0CategoryName($categoryId)
    {
        $category = ProductCategory::find($categoryId);
        if ($category && $category->parent_category_id) {
            return $this->getLevel0CategoryName($category->parent_category_id);
        }
        return $category ? $category->category_name : '';
    }

    public function store(Request $request)
    {
        $category = new ProductCategory();
        $category->category_name = $request->input('category_name');
        $category->status = $request->input('status');
        $category->show_menu = $request->input('show_menu');
        $category->parent_category_id = $request->input('parent_category_id');

        // Lấy tên của danh mục cha cấp 0
        $parentCategoryName = $this->getLevel0CategoryName($request->input('parent_category_id'));

        // Tạo slug sử dụng tên danh mục và tên của danh mục cha cấp 0
        $category->slug = Str::slug($request->input('category_name') . ' ' . $parentCategoryName);

        if ($request->hasFile('image')) {
            $uploadPath = '/uploads';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $imageFile->move(public_path($uploadPath), $filename);
            $category->image = $uploadPath . '/' . $filename;
        }
        $category->save();
        return redirect()->route('admin.category.show')->with('success', 'Product category added successfully');
    }

    public function update($id, Request $request)
    {
        $category = ProductCategory::find($id);
        $category->category_name = $request->input('category_name');
        $category->status = $request->input('status');
        $category->show_menu = $request->has('show_menu') ? $request->input('show_menu') : false;
        $category->parent_category_id = $request->input('parent_category_id');

        // Lấy tên của danh mục cha cấp 0
        $parentCategoryName = $this->getLevel0CategoryName($request->input('parent_category_id'));

        // Tạo slug sử dụng tên danh mục và tên của danh mục cha cấp 0
        $category->slug = Str::slug($request->input('category_name') . ' ' . $parentCategoryName);

        if ($request->hasFile('image')) {
            $uploadPath = '/uploads';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $imageFile->move(public_path($uploadPath), $filename);

            // Xóa ảnh cũ nếu có
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $category->image = $uploadPath . '/' . $filename;
        }

        $category->save();
        return redirect()->route('admin.category.show')->with('success', 'Category updated successfully');
    }


    public function show($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $categories = ProductCategory::all();
        $htmlOption = $this->categoryRecursive(0);
        $category = ProductCategory::findOrFail($id);
        $categoryHtml = $this->categoryRecursive(0, '', $category->parent_category_id);
        return view('pages/Admin/Category/edit', compact('categories', 'category', 'htmlOption', 'categoryHtml'));
    }


    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        // Xóa các danh mục con
        $this->deleteChildren($category);
        // Xóa danh mục cha
        $category->delete();

        return redirect()->route('admin.category.show');
    }
    private function deleteChildren($category)
    {
        foreach ($category->children as $child) {
            $this->deleteChildren($child); // Xóa các danh mục con của danh mục con
            $child->delete(); // Xóa danh mục con
        }
    }
}
