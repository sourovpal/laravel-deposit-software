<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::get();
        return view('backend.brand.index', compact('brands'));
    }
    public function create(Request $request)
    {
        return view('backend.brand.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp'
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/brand'), $filename);
            $data['image'] = $filename;
        }
        try {
            Brand::create($data);
            return back()->withSuccess('Created Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $edit = Brand::findOrFail($request->id);
        return view('backend.brand.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $edit = Brand::findOrFail($request->id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/brand'), $filename);
            $data['image'] = $filename;
        }
        try {
            $edit->update($data);
            return back()->withSuccess('Updated Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->delete();
        return back()->withSuccess('Deleted Successful.');
    }
}
