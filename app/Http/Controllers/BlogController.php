<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogCategories;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show()
    {
        $blogs = Blogs::all();
        return view('/pages/Admin/Blog/index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategories::all();
        return view('/pages/Admin/Blog/create', compact('categories')); // Chuyển đến view để tạo mới bài viết
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
        Blogs::create($data);

        return redirect()->route('blog.index')
            ->with('success', 'Bài viết đã được tạo thành công.');
    }
    public function edit($id)
    {
        $categories = BlogCategories::all();
        $blog = Blogs::find($id);
        if (!$blog) {
            return redirect()->route('blogs.index')->with('error', 'Bài viết không tồn tại');
        }
        return view('/pages/Admin/Blog/edit', compact('blog', 'categories'));
    }


    public function update($id, Request $request)
    {
        $blog = Blogs::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $uploadPath = '/uploads';
            $imageFile = $request->file('image');
            $extension = $imageFile->getClientOriginalExtension();
            $filename = uniqid() . '.' . $extension;
            $imageFile->move(public_path($uploadPath), $filename);

            // Xóa ảnh cũ nếu có
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }

            $data['image'] = $uploadPath . '/' . $filename;
        }

        $blog->update($data);

        return redirect()->route('blog.index')
            ->with('success', 'Bài viết đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $blog = Blogs::findOrFail($id);
        $blog->delete();
        return redirect()->route('blog.index')
            ->with('success', 'Bài viết đã được xóa thành công.');
    }
}
