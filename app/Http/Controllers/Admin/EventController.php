<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        return view('backend.event.index', compact('events'));
    }
    public function edit(Request $request)
    {
        $edit = Event::findOrFail($request->id);
        return view('backend.event.edit', compact('edit'));
    }
    public function update(Request $request)
    {
        $edit = Event::findOrFail($request->id);
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = [];

        if ($request->hasFile('image') && $request->file('image')->isValid() && $file = $request->file('image')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/frontend/images/event'), $filename);
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
