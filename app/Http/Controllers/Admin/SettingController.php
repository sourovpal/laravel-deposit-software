<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::get();
        return view('backend.setting.index', compact('settings'));
    }
    public function edit(Request $request)
    {
        $edit = Setting::findOrFail($request->id);
        return view('backend.setting.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = Setting::findOrFail($request->id);
        $request->validate([
            'tron20' => 'required',
            'erc20' => 'required',
        ]);

        $data = [];

        $data['tron20'] = $request->tron20;
        $data['erc20'] = $request->erc20;
        try {
            $edit->update($data);
            return back()->withSuccess('Updated Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
