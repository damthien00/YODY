<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('pages/Admin/Brand/show', compact('brands'));
    }

    public function create()
    {
        return view('Pages/Brand/create');
    }

    public function store(Request $request)
    {
        Brand::create($request->all());
        return redirect()->route('admin.brand.show')->with('success', 'Product added successfully');
    }

    public function show($id)
    {
        $category = Brand::findOrFail($id);
        return view('brand.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request)
    {
        $brand_id = $request->input('brand_id');
        $brand = Brand::find($brand_id);
        $brand->brand_name = $request->input('brand_name');
        $brand->save();
        return redirect()->route('admin.brand.show')->with('success', 'brand updated successfully');
    }

    public function destroy(Request $request)
    {
        $brand_id = $request->input('brand_id');
        $brand = Brand::findOrFail($brand_id);
        $brand->delete();
        return redirect()->route('admin.brand.show');
    }
}
