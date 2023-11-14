<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(){
        $certificates = Certificate::get();
        return view('backend.certificate.index', compact('certificates'));
    }
    public function edit(Request $request)
    {
        $edit = Certificate::findOrFail($request->id);
        return view('backend.certificate.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = Certificate::findOrFail($request->id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/certificate'), $filename);
            $data['file'] = $filename;
        }
        try {
            $edit->update($data);
            return back()->withSuccess('Updated Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
