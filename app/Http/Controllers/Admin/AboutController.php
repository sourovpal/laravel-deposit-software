<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts = About::get();
        return view('backend.about.index', compact('abouts'));
    }
    public function edit(Request $request)
    {
        $edit = About::findOrFail($request->id);
        return view('backend.about.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = About::findOrFail($request->id);

        $data = [];

        $data['title'] = $request->title;
        $data['content'] = $request->content;
        try {
            $edit->update($data);
            return back()->withSuccess('Updated Successful.');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
