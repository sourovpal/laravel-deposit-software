<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index(){
        $contracts = Contract::get();
        return view('backend.contract.index', compact('contracts'));
    }
    public function edit(Request $request)
    {
        $edit = Contract::findOrFail($request->id);
        return view('backend.contract.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = Contract::findOrFail($request->id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/contract'), $filename);
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
