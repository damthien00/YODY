<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    function show()
    {
        $colors = Size::all();
        return view('/pages/Admin/Color/color', compact('colors'));
    }

    function create()
    {

        return view('/pages/Admin/Size/create');
    }

    public function store(Request $request)
    {
        $existingSize = Size::where('size_name')->first();
        if ($existingSize) {
            return redirect()->route('size.index')->with('error', 'Mã màu đã tồn tại trong cơ sở dữ liệu!');
        } else {
            Size::create($request->all());
        }
        return redirect()->route('color.index')->with('success', 'Màu sắc đã được tạo mới thành công!');
    }

    function edit($id)
    {
        $size = Size::find($id);
        return view('/pages/Admin/Size/edit', compact('size'));
    }
    public function update(Request $request, $id)
    {
        $size = Size::find($id);
        $size->size_name = $request->input('size_name');
        $size->save();
        return redirect()->route('size.index')->with('success', 'Kích cỡ đã được cập nhật thành công!');
    }
    // Xóa kích cỡ
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('size.index')->with('success', 'Kích cỡ đã được xóa thành công!');
    }
}
