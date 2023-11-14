<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::get();
        return view('backend.faq.index', compact('faqs'));
    }
    public function edit(Request $request)
    {
        $edit = Faq::findOrFail($request->id);
        return view('backend.faq.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = Faq::findOrFail($request->id);

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
