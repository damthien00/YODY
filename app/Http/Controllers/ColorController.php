<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    function show()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('/pages/Admin/Color/color', compact('colors', 'sizes'));
    }

    function create()
    {
        $existingColor = Color::where('color_name')->first();
        if ($existingColor) {
            return redirect()->route('color.index')->with('error', 'Mã màu đã tồn tại trong cơ sở dữ liệu!');
        }
        $colors = Color::all();
        return view('/pages/Admin/Color/create', compact('colors'));
    }

    public function store(Request $request)
    {
        Color::create($request->all());
        return redirect()->route('color.index')->with('success', 'Màu sắc đã được tạo mới thành công!');
    }

    function edit($id)
    {
        $color = Color::find($id);
        return view('/pages/Admin/Color/edit', compact('color'));
    }
    public function update(Request $request, $id)
    {
        $color = Color::find($id);
        $color->color_name = $request->input('color_name');
        $color->code = $request->input('code');
        $color->save();
        return redirect()->route('color.index')->with('success', 'Màu sắc đã được cập nhật thành công!');
    }
    // Xóa màu sắc
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->route('color.index')->with('success', 'Màu sắc đã được xóa thành công!');
    }
}
