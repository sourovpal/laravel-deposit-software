<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    
    public function index(Request $request){
        $admins = Admin::orderBy('id', 'desc')->get();
        return view('backend.admin.index', compact('admins'));
    }
    
    public function create(Request $request){
        return view('backend.admin.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'phone' => 'required',
            'password' => 'required',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $data = [];

        if($request->hasFile('avatar') && $request->file('avatar')->isValid() && $file = $request->file('avatar')){
            $ext = $file->getClientOriginalExtension();
            $filename = time().'-'.md5(rand()).'.'.$ext;
            $file->move(public_path('/profile'), $filename);
            $data['avatar'] = $filename;
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = bcrypt($request->password);
        try{
            Admin::create($data);
            return back()->withSuccess('Created Successful.');

        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }

    public function show(Request $request){
        
    }

    public function edit(Request $request){
        $edit = Admin::findOrFail($request->id);
        return view('backend.admin.edit', compact('edit'));
    }

    public function update(Request $request){
        $edit = Admin::findOrFail($request->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$edit->id,
            'phone' => 'required',
            'password' => 'required',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,webp',
        ]);

        $data = [];

        if($request->hasFile('avatar') && $request->file('avatar')->isValid() && $file = $request->file('avatar')){
            $ext = $file->getClientOriginalExtension();
            $filename = time().'-'.md5(rand()).'.'.$ext;
            $file->move(public_path('/profile'), $filename);
            $data['avatar'] = $filename;
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        try{
            Admin::create($data);
            return back()->withSuccess('Updated Successful.');
            
        }catch(\Exception $e){
            return back()->withError($e->getMessage());
        }
    }
    
    public function destroy(Request $request){
        $destroy = Admin::findOrFail($request->id);
        $destroy->delete();
        return back()->withSuccess('Deleted Successful.');
    }
}
