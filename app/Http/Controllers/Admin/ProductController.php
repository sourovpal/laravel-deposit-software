<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.product.index', compact('products'));
    }

    public function create(Request $request)
    {
        return view('backend.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:products,title',
            'price' => 'required',
            'price_to' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'position' => 'nullable|integer',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/product'), $filename);
            $data['image'] = $filename;
        }

        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title);
        $data['price'] = $request->price;
        $data['price_to'] = $request->price_to;
        $data['position'] = $request->position;
        $data['status'] = $request->status ? 1 : 0;
        try {
            Product::create($data);
            return back()->withSuccess('Created Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function show(Request $request)
    {
    }

    public function edit(Request $request)
    {
        $edit = Product::findOrFail($request->id);
        return view('backend.product.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $edit = Product::findOrFail($request->id);
        $request->validate([
            'title' => 'required|unique:products,title,' . $edit->id,
            'price' => 'required',
            'price_to' => 'required',
            'position' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/product'), $filename);
            $data['image'] = $filename;
        }

        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title);
        $data['price'] = $request->price;
        $data['price_to'] = $request->price_to;
        $data['position'] = $request->position;
        $data['status'] = $request->status ? 1 : 0;
        try {
            $edit->update($data);
            return back()->withSuccess('Updated Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();
        return back()->withSuccess('Deleted Successful.');
    }
}
